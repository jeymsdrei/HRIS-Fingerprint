<?php

namespace App\Http\Controllers;

use App\Models\BiometricAgent;
use App\Models\BiometricDevice;
use App\Models\Employee;
use App\Models\MakeUpClass;
use App\Models\Setting;
use App\Models\TeachingSchedule;
use App\Models\WorkSchedule;
use App\Services\AttendanceService;
use App\Services\BiometricService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BiometricController extends Controller
{
    public function index()
    {
        // Detect connectivity loss so stale "online" states don't linger.
        // An agent is considered offline after missing a few heartbeats.
        $staleAfter = now()->subSeconds(3 * 60);
        BiometricAgent::where('status', 'online')
            ->where(fn ($q) => $q->whereNull('last_seen_at')->orWhere('last_seen_at', '<', $staleAfter))
            ->update(['status' => 'offline']);

        // Device liveness:
        //  - Agent-served (USB) devices follow their agent's status.
        //  - Standalone network devices go offline when their last sync is old.
        $deviceStaleAfter = now()->subSeconds(3 * 60);
        BiometricDevice::where('status', 'online')
            ->where(function ($q) use ($deviceStaleAfter) {
                $q->whereHas('agents')
                    ->whereDoesntHave('agents', fn ($a) => $a->where('status', 'online'))
                    ->orWhere(fn ($q2) => $q2->whereDoesntHave('agents')
                        ->where(fn ($w) => $w->whereNull('last_sync_at')->orWhere('last_sync_at', '<', $deviceStaleAfter)));
            })
            ->update(['status' => 'offline']);

        $devices = BiometricDevice::orderBy('name')->get();

        return view('biometrics.index', compact('devices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ip_address' => 'required|ip',
            'port' => 'required|integer|between:1,65535',
            'serial_number' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
        ]);
        BiometricDevice::create($request->validated());

        return back()->with('success', 'Biometric device registered.');
    }

    public function sync(BiometricDevice $device, BiometricService $service)
    {
        $result = $service->pullAttendance($device);

        return back()->with(
            $result['ok'] ? 'success' : 'error',
            $result['ok'] ? "Synced device — {$result['imported']} new punches imported." : 'Sync failed: '.$result['error']
        );
    }

    public function testConnection(BiometricDevice $device, BiometricService $service)
    {
        $ok = $service->connect($device);
        $service->disconnect();

        return back()->with($ok ? 'success' : 'error', $ok ? 'Device connection OK.' : 'Device unreachable.');
    }

    public function destroy(BiometricDevice $device)
    {
        $device->delete();

        return back()->with('success', 'Device removed.');
    }

    /**
     * Manual punch form.
     */
    public function punches()
    {
        $devices = BiometricDevice::where('is_active', true)->get();
        $employees = Employee::where('is_active', true)->orderBy('last_name')->get();

        return view('biometrics.punches', compact('devices', 'employees'));
    }

    public function storePunch(Request $request, AttendanceService $service)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'punch_time' => 'required|date',
            'device_id' => 'nullable|exists:biometric_devices,id',
        ]);
        $employee = Employee::findOrFail($request->employee_id);
        $service->registerPunch($employee, Carbon::parse($request->punch_time), $request->device_id, 'manual');

        return back()->with('success', 'Punch registered.');
    }

    /**
     * Device push endpoint (used by the local sync agent on LAN).
     */
    public function apiPush(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'agent_id' => 'nullable|string',
            'records' => 'required|array',
            'records.*.fingerprint_id' => 'required|integer',
            'records.*.punch_time' => 'required|date',
            'records.*.source_key' => 'nullable|string|max:100',
            'records.*.action' => 'nullable|string|in:time_in,time_out',
            'records.*.score' => 'nullable|integer|min:0',
        ]);

        $token = config('services.biometric.token');
        if (! hash_equals($token, $request->token)) {
            abort(401);
        }

        $service = app(BiometricService::class);
        $imported = 0;
        $agentId = $request->input('agent_id');
        foreach ($request->records as $record) {
            $imported += $service->persistPunch($record, $agentId, null, 'api') ? 1 : 0;
        }

        // A successful push proves the reader is connected — mark the agent's
        // linked device online in realtime so the device list reflects live
        // connectivity. Only the linked device is touched (not every device).
        if ($agentId) {
            $agent = BiometricAgent::where('agent_id', $agentId)->where('is_active', true)->first();
            if ($agent?->device_id) {
                BiometricDevice::whereKey($agent->device_id)
                    ->update(['status' => 'online', 'last_sync_at' => now()]);
            }

            // Touch the agent's heartbeat on any successful push.
            $agent->update(['status' => 'online', 'last_seen_at' => now()]);
        }

        return response()->json(['ok' => true, 'imported' => $imported]);
    }

    /**
     * Idempotent agent registration. The client generates and persists a
     * stable agent_id (surviving restarts); this endpoint only upserts it.
     */
    public function register(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'agent_id' => 'required|string|max:64',
            'name' => 'nullable|string|max:255',
            'computer_name' => 'nullable|string|max:255',
            'api_base_url' => 'nullable|string|max:255',
            'device_id' => 'nullable|integer|exists:biometric_devices,id',
        ]);

        $token = config('services.biometric.token');
        if (! hash_equals($token, $request->token)) {
            abort(401);
        }

        $agent = BiometricAgent::firstOrNew(['agent_id' => $request->agent_id]);
        $agent->name = $request->input('name');
        $agent->computer_name = $request->input('computer_name');
        $agent->api_base_url = $request->input('api_base_url');

        // Link the agent to the device it serves. An already-linked agent
        // keeps its link unless an explicit device_id is provided.
        if ($request->filled('device_id')) {
            $agent->device_id = $request->input('device_id');
        } elseif (empty($agent->device_id)) {
            // Fallback: bind to the single active device so a USB reader on a
            // laptop reflects live status without extra client config.
            $agent->device_id = BiometricDevice::where('is_active', true)->value('id');
        }

        $agent->status = 'online';
        $agent->last_seen_at = now();
        $agent->is_active = true;
        $agent->save();

        $agent->device_id && BiometricDevice::whereKey($agent->device_id)
            ->update(['status' => 'online', 'last_sync_at' => now()]);

        return response()->json(['ok' => true, 'agent_id' => $agent->agent_id, 'device_id' => $agent->device_id]);
    }

    /**
     * Heartbeat: keeps the agent status/last_seen fresh so the device list
     * shows live connectivity even when no punches are being recorded.
     */
    public function heartbeat(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'agent_id' => 'required|string|max:64',
        ]);

        $token = config('services.biometric.token');
        if (! hash_equals($token, $request->token)) {
            abort(401);
        }

        $updated = BiometricAgent::where('agent_id', $request->agent_id)
            ->where('is_active', true)
            ->update(['status' => 'online', 'last_seen_at' => now()]);

        // A heartbeat proves the reader behind the agent is connected — reflect
        // it on the linked device so the device list shows live status.
        $agent = BiometricAgent::where('agent_id', $request->agent_id)->where('is_active', true)->first();
        if ($agent?->device_id) {
            BiometricDevice::whereKey($agent->device_id)
                ->update(['status' => 'online', 'last_sync_at' => now()]);
        }

        return response()->json([
            'ok' => true,
            'registered' => $updated > 0,
            'sync_version' => $this->employeeSyncVersion(),
        ]);
    }

    /**
     * Opaque change-token for the employee list served to the enrollment app.
     * Changes (new/edit/deactivate) whenever the employee data changes, so the
     * agent can skip re-downloading the whole list when nothing changed.
     * The active row count keeps the token stable across a hard delete (a row
     * removed entirely would not otherwise move the max updated_at timestamp).
     */
    private function employeeSyncVersion(): string
    {
        $employeeToken = (string) Employee::query()->max('updated_at');
        $scheduleToken = (string) TeachingSchedule::query()->max('updated_at')
            .'|'.(string) WorkSchedule::query()->max('updated_at')
            .'|'.(string) MakeUpClass::query()->max('updated_at')
            .'|'.Setting::get('default_shift_start', '08:00')
            .'|'.Setting::get('default_shift_end', '17:00');

        // The active employee set itself (not just its count / updated_at). This
        // changes on any add, remove, activate or deactivate even when written
        // directly in SQL without touching updated_at, so readers always learn
        // about a deactivated employee.
        $activeSetToken = md5(
            Employee::where('is_active', true)->orderBy('id')->pluck('id')->implode(',')
        );

        return $employeeToken.'|'.Employee::where('is_active', true)->count().'|'.$scheduleToken.'|'.$activeSetToken.'|v5';
    }

    /**
     * Effective clock-in windows for one employee, resolved server-side for all
     * seven weekdays (0=Sunday .. 6=Saturday) so the agent needs no scheduler
     * rules of its own. Days with no window are omitted (rest days). Teaching
     * staff use their active (per school-year/semester) class schedules; non-
     * teaching staff use their work schedules, falling back to the company
     * default Monday-Friday shift like AttendanceService does.
     *
     * @return array<int, array{day: int, times: array<int, array{start: string, end: string}>}>
     */
    private function scheduleDays(Employee $employee): array
    {
        $days = [];
        for ($day = 0; $day <= 6; $day++) {
            if ($employee->isTeaching) {
                $slots = $employee->teachingSchedules()
                    ->where('day', $day)
                    ->where(function ($q) {
                        $q->whereHas('schoolYear', fn ($sq) => $sq->where('is_active', true))
                            ->orWhereNull('school_year_id');
                    })
                    ->where(function ($q) {
                        $q->whereHas('semester', fn ($sq) => $sq->where('is_active', true))
                            ->orWhereNull('semester_id');
                    })
                    ->orderBy('start_time')
                    ->get(['start_time', 'end_time'])
                    ->map(fn ($s) => ['start' => $s->start_time->format('H:i'), 'end' => $s->end_time->format('H:i')])
                    ->values()
                    ->all();
            } else {
                $slots = $employee->workSchedules()
                    ->where('day', $day)
                    ->orderBy('start_time')
                    ->get(['start_time', 'end_time'])
                    ->map(fn ($s) => ['start' => $s->start_time->format('H:i'), 'end' => $s->end_time->format('H:i')])
                    ->values()
                    ->all();

                if (empty($slots) && $day >= 1 && $day <= 6) {
                    $slots = [[
                        'start' => Setting::get('default_shift_start', '08:00'),
                        'end' => Setting::get('default_shift_end', '17:00'),
                    ]];
                }
            }

            if (! empty($slots)) {
                $days[] = ['day' => $day, 'times' => $slots];
            }
        }

        return $days;
    }

    /**
     * Approved one-off make-up classes for one employee, from today onward on
     * any school day (Mon-Sat). These act as valid clock-in windows on their
     * specific class date, so an employee may punch on a day that has no
     * regular schedule only when a make-up class falls on that date/time.
     *
     * @return array<int, array{date: string, start: string, end: string}>
     */
    private function makeUpClasses(Employee $employee): array
    {
        $classes = $employee->makeUpClasses()
            ->where('approval_status', 'approved')
            ->whereDate('class_date', '>=', now()->toDateString())
            ->orderBy('class_date')
            ->orderBy('start_time')
            ->get(['class_date', 'start_time', 'end_time']);

        return $classes
            ->filter(fn ($m) => $m->class_date->dayOfWeek >= 1 && $m->class_date->dayOfWeek <= 6)
            ->map(fn ($m) => [
                'date' => $m->class_date->format('Y-m-d'),
                'start' => $m->start_time->format('H:i'),
                'end' => $m->end_time->format('H:i'),
            ])
            ->values()
            ->all();
    }

    /**
     * Integration endpoint: return active employees for the enrollment app.
     * Token-guarded with the same BIOMETRIC_API_TOKEN as /api/device/push.
     */
    public function employees(Request $request)
    {
        $request->validate(['token' => 'required|string']);

        $token = config('services.biometric.token');
        if (! hash_equals($token, $request->token)) {
            abort(401);
        }

        $employees = Employee::where('is_active', true)
            ->with('department', 'position')
            ->orderBy('employee_id')
            ->get()
            ->map(function ($e) {
                return [
                    'id' => $e->id,
                    'employee_id' => $e->employee_id,
                    'fingerprint_id' => $e->fingerprint_id,
                    'is_teaching' => $e->isTeaching,
                    'first_name' => $e->first_name,
                    'middle_name' => $e->middle_name,
                    'last_name' => $e->last_name,
                    'department' => $e->department?->name,
                    'position' => $e->position?->name,
                    'photo_path' => $e->photo_path,
                    'photo_url' => $e->photo_path
                        ? asset('storage/'.$e->photo_path)
                        : null,
                    'photo_data' => $this->photoData($e->photo_path),
                    'template_base64' => $e->fingerprint_template,
                    'schedule_days' => $this->scheduleDays($e),
                    'make_up_classes' => $this->makeUpClasses($e),
                ];
            });

        return response()->json(['employees' => $employees]);
    }

    /**
     * Embeddable photo for LAN clients (the enrollment app). A URL is fragile
     * because it depends on the host the client used to reach the API; base64
     * renders regardless of network/host/APP_URL. A cached 160px thumbnail
     * keeps the payload tiny even for large originals.
     */
    private function photoData(?string $photoPath): ?string
    {
        if (! $photoPath) {
            return null;
        }

        $disk = Storage::disk('public');
        if (! $disk->exists($photoPath)) {
            return null;
        }

        $name = pathinfo($photoPath, PATHINFO_FILENAME);
        $thumbPath = 'employee-photos/thumbs/'.$name.'.jpg';

        if (! $disk->exists($thumbPath)) {
            $this->buildThumbnail($photoPath, $thumbPath);
        }

        if (! $disk->exists($thumbPath)) {
            return null;
        }

        return 'data:image/jpeg;base64,'.base64_encode($disk->get($thumbPath));
    }

    private function buildThumbnail(string $photoPath, string $thumbPath): void
    {
        try {
            $full = Storage::disk('public')->path($photoPath);
            $info = getimagesize($full);
            if ($info === false) {
                return;
            }

            $original = match ($info[2]) {
                IMAGETYPE_JPEG => imagecreatefromjpeg($full),
                IMAGETYPE_PNG => imagecreatefrompng($full),
                default => null,
            };
            if (! $original) {
                return;
            }

            $srcW = imagesx($original);
            $srcH = imagesy($original);
            $max = 160;
            $scale = min($max / $srcW, $max / $srcH, 1);
            $dstW = max(1, (int) round($srcW * $scale));
            $dstH = max(1, (int) round($srcH * $scale));

            $resized = imagecreatetruecolor($dstW, $dstH);
            imagecopyresampled($resized, $original, 0, 0, 0, 0, $dstW, $dstH, $srcW, $srcH);
            imagedestroy($original);

            // Flatten transparency onto white for PNG sources.
            $canvas = imagecreatetruecolor($dstW, $dstH);
            $white = imagecolorallocate($canvas, 255, 255, 255);
            imagefill($canvas, 0, 0, $white);
            imagecopy($canvas, $resized, 0, 0, 0, 0, $dstW, $dstH);
            imagedestroy($resized);

            ob_start();
            imagejpeg($canvas, null, 80);
            $jpeg = ob_get_clean();
            imagedestroy($canvas);

            if ($jpeg === false || $jpeg === '') {
                return;
            }

            Storage::disk('public')->put($thumbPath, $jpeg);
        } catch (\Throwable $e) {
            Log::warning('Biometric: failed to build employee photo thumbnail.', [
                'photo_path' => $photoPath,
                'exception' => $e,
            ]);
        }
    }

    /**
     * Integration endpoint: assign a fingerprint_id to an employee for the
     * enrollment app. Token-guarded. If the employee already has a
     * fingerprint_id the existing value is returned. Otherwise the next lowest
     * unused id is claimed (fingerprint_id is unique).
     */
    public function assignFingerprint(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'employee_id' => 'required|string',
        ]);

        $token = config('services.biometric.token');
        if (! hash_equals($token, $request->token)) {
            abort(401);
        }

        $employee = Employee::where('employee_id', $request->employee_id)
            ->where('is_active', true)
            ->first();

        if (! $employee) {
            return response()->json(['ok' => false, 'error' => 'employee_not_found']);
        }

        if ($employee->fingerprint_id !== null) {
            return response()->json([
                'ok' => true,
                'fingerprint_id' => $employee->fingerprint_id,
                'template_base64' => $employee->fingerprint_template,
            ]);
        }

        $next = (int) Employee::max('fingerprint_id') + 1;
        if ($next < 1) {
            $next = 1;
        }

        $employee->fingerprint_id = $next;
        $employee->save();

        return response()->json([
            'ok' => true,
            'fingerprint_id' => $next,
            'employee_id' => $employee->employee_id,
            'template_base64' => null,
        ]);
    }

    /**
     * Integration endpoint: store the enrolled fingerprint template for an
     * employee. The server keeps it as the source of truth so the BioClock
     * agent can re-provision the reader after a device wipe or a lost local
     * copy without re-enrolling the employee.
     */
    public function saveTemplate(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'fingerprint_id' => 'required|integer',
            'template_base64' => 'required|string',
        ]);

        $token = config('services.biometric.token');
        if (! hash_equals($token, $request->token)) {
            abort(401);
        }

        $employee = Employee::where('fingerprint_id', $request->fingerprint_id)->first();
        if (! $employee) {
            return response()->json(['ok' => false, 'error' => 'employee_not_found']);
        }

        $employee->update(['fingerprint_template' => $request->template_base64]);

        return response()->json([
            'ok' => true,
            'employee_id' => $employee->employee_id,
            'fingerprint_id' => $employee->fingerprint_id,
        ]);
    }

    /**
     * Integration endpoint: upload an employee photo captured at enrollment
     * (or from a device/vendor export). Token-guarded. Replaces any existing
     * photo so enrollment updates stay the single source of truth.
     */
    public function photo(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'employee_id' => 'required|string',
            'photo' => 'required|file|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $token = config('services.biometric.token');
        if (! hash_equals($token, $request->token)) {
            abort(401);
        }

        $employee = Employee::where('employee_id', $request->employee_id)->first();
        if (! $employee) {
            return response()->json(['ok' => false, 'error' => 'employee_not_found']);
        }

        if ($employee->photo_path) {
            Storage::disk('public')->delete($employee->photo_path);
        }

        $path = $request->file('photo')->store('employee-photos', 'public');
        $employee->update(['photo_path' => $path]);

        return response()->json([
            'ok' => true,
            'photo_path' => $path,
            'photo_url' => asset('storage/'.$path),
        ]);
    }
}
