<?php

namespace App\Http\Controllers;

use App\Models\BiometricAgent;
use App\Models\BiometricDevice;
use App\Models\Employee;
use App\Services\AttendanceService;
use App\Services\BiometricService;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        BiometricDevice::create($request->all());

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

        return response()->json(['ok' => true, 'registered' => $updated > 0]);
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
                    'first_name' => $e->first_name,
                    'middle_name' => $e->middle_name,
                    'last_name' => $e->last_name,
                    'department' => $e->department?->name,
                    'position' => $e->position?->name,
                ];
            });

        return response()->json(['employees' => $employees]);
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
            return response()->json(['ok' => true, 'fingerprint_id' => $employee->fingerprint_id]);
        }

        $next = (int) Employee::max('fingerprint_id') + 1;
        if ($next < 1) {
            $next = 1;
        }

        $employee->fingerprint_id = $next;
        $employee->save();

        return response()->json(['ok' => true, 'fingerprint_id' => $next, 'employee_id' => $employee->employee_id]);
    }
}
