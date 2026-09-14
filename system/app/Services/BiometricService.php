<?php

namespace App\Services;

use App\Models\AttendanceLog;
use App\Models\BiometricDevice;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

/**
 * Minimal ZKTeco (ZK) fingerprint device client over TCP.
 *
 * Implements the session handshake (CMD_CONNECT) and attendance record
 * download (CMD_ATTLOG_RRQ). If a device is unreachable the methods fail
 * gracefully so the app keeps running — the same data can be received
 * through the local sync agent POSTing to the device API endpoint.
 */
class BiometricService
{
    private $socket = null;

    public const CMD_CONNECT = 1000;

    public const CMD_ATTLOG_RRQ = 13;

    public const CMD_ENABLE_DEVICE = 1001;

    public const CMD_DISABLE_DEVICE = 1002;

    private const HEADER = 0x504830;

    private const COMM_BYTE = 49;

    private const READ_TIMEOUT = 15;

    private const MAX_RECORD_SIZE = 4 * 1024 * 1024;

    public function isConnected(): bool
    {
        return is_resource($this->socket);
    }

    /**
     * Establish a session with the device.
     */
    public function connect(BiometricDevice|string $device, ?int $port = null): bool
    {
        if ($device instanceof BiometricDevice) {
            $ip = $device->ip_address;
            $port = $device->port;
            $device->update(['status' => 'offline']);
        } else {
            $ip = $device;
        }

        $errno = $errstr = null;
        @$this->socket = fsockopen($ip, $port ?? 4370, $errno, $errstr, self::READ_TIMEOUT);
        if (! $this->socket) {
            Log::warning("ZKTeco: cannot connect to {$ip}:{$port} - {$errstr}");

            return false;
        }
        stream_set_timeout($this->socket, self::READ_TIMEOUT);

        $this->sendCommand(self::CMD_CONNECT);
        if ($this->readResponse() === null) {
            $this->disconnect();

            return false;
        }

        if ($device instanceof BiometricDevice) {
            $device->update(['status' => 'online', 'last_sync_at' => now()]);
        }

        return true;
    }

    public function disconnect(): void
    {
        if ($this->socket) {
            @fclose($this->socket);
        }
        $this->socket = null;
    }

    /**
     * ZK protocol command frame: 8-byte header + session id + payload.
     */
    private function buildFrame(int $command, string $payload = ''): string
    {
        $size = 10 + strlen($payload);
        $frame = pack('N', self::HEADER);
        $frame .= chr(self::COMM_BYTE);
        $frame .= pack('N', $command & 0xFFFFFFFF);
        $frame .= pack('N', $size);
        $frame .= pack('N', 0);
        $frame .= '0000'; // session id
        $frame .= $payload;

        return $frame;
    }

    private function sendCommand(int $command): bool
    {
        if (! $this->socket) {
            return false;
        }
        $frame = $this->buildFrame($command);
        $result = @fwrite($this->socket, $frame);
        if ($result === false) {
            Log::warning("ZKTeco: failed sending command {$command}");

            return false;
        }

        return true;
    }

    private function readResponse(): ?string
    {
        if (! $this->socket) {
            return null;
        }
        $header = @fread($this->socket, 8);
        if ($header === false || strlen($header) < 8) {
            return null;
        }
        $unpacked = unpack('Nhi/Ncomm/Nsize', $header);
        if (! $unpacked || (($unpacked['comm'] >> 24) & 0xFF) !== self::COMM_BYTE) {
            return null;
        }

        $remaining = min(max(0, $unpacked['size'] - 2), self::MAX_RECORD_SIZE);
        $rest = '';
        while ($remaining > 0) {
            $chunk = @fread($this->socket, $remaining);
            if ($chunk === false || $chunk === '') {
                break;
            }
            $rest .= $chunk;
            $remaining -= strlen($chunk);
        }

        return $header.$rest;
    }

    /**
     * Parse raw attendance data frames (12-byte records):
     * user_id(4) + state(1) + timestamp(7, YYMMDDhhmmss packed).
     */
    private function parseRecords(string $buffer): array
    {
        $records = [];
        $data = substr($buffer, 8);
        $len = strlen($data);
        $i = 0;
        while ($i + 12 <= $len) {
            $userId = unpack('V', substr($data, $i, 4))[1] ?? 0;
            $tsBytes = substr($data, $i + 5, 7);
            if (strlen($tsBytes) < 7) {
                break;
            }
            $hex = bin2hex(strrev($tsBytes));
            $dec = hexdec($hex);

            $year = 2000 + (($dec >> 8) & 0xFF);
            $month = ($dec >> 16) & 0xFF;
            $day = ($dec >> 24) & 0xFF;
            $hour = ($dec >> 32) & 0xFF;
            $minute = ($dec >> 40) & 0xFF;
            $second = ($dec >> 48) & 0xFF;

            if ($month >= 1 && $month <= 12 && $day >= 1 && $day <= 31) {
                try {
                    $records[] = [
                        'fingerprint_id' => $userId,
                        'punch_time' => Carbon::create($year, $month, $day, $hour, $minute, $second),
                    ];
                } catch (\Throwable) {
                    // skip malformed timestamp
                }
            }
            $i += 12;
        }

        return $records;
    }

    /**
     * Pull all attendance records from the device and persist them.
     */
    public function pullAttendance(BiometricDevice $device): array
    {
        if (! $this->connect($device)) {
            return ['ok' => false, 'imported' => 0, 'error' => 'Device unreachable'];
        }

        $this->sendCommand(self::CMD_ATTLOG_RRQ);
        $buffer = '';
        $start = microtime(true);
        while (microtime(true) - $start < 60) {
            $chunk = $this->readResponse();
            if ($chunk === null || $chunk === '') {
                break;
            }
            $buffer .= $chunk;
            if (strlen($buffer) >= self::MAX_RECORD_SIZE) {
                break;
            }
        }
        $this->disconnect();

        $imported = 0;
        foreach ($this->parseRecords($buffer) as $record) {
            $imported += $this->persistPunch($record, deviceId: $device->id) ? 1 : 0;
        }
        $device->update(['last_sync_at' => now()]);

        return ['ok' => true, 'imported' => $imported, 'error' => null];
    }

    /**
     * Save a punch and reprocess the employee's attendance for that day.
     *
     * Dedup: if a source_key is present it is authoritative (a stable id from
     * the SDK/agent log). Otherwise the legacy (employee_id, punch_time) pair
     * is used so re-syncs of the same log never double-insert.
     *
     * @param  array{fingerprint_id: int, punch_time: mixed, source_key?: string, action?: string|null}  $record
     * @param  int|null  $deviceId  Must reference a biometric_devices row. Agent
     *                              pushes (USB readers) don't own a network device,
     *                              so they pass null — never an agent id.
     */
    public function persistPunch(array $record, ?string $agentId = null, ?int $deviceId = null, string $source = 'device'): bool
    {
        $employee = Employee::where('fingerprint_id', $record['fingerprint_id'])->first();
        if (! $employee) {
            return false;
        }

        $punchTime = $record['punch_time'] instanceof Carbon
            ? $record['punch_time']
            : Carbon::parse($record['punch_time']);

        $sourceKey = ! empty($record['source_key']) ? (string) $record['source_key'] : null;

        $exists = $sourceKey
            ? AttendanceLog::where('employee_id', $employee->id)
                ->where('source_key', $sourceKey)
                ->exists()
            : AttendanceLog::where('employee_id', $employee->id)
                ->where('punch_time', $punchTime)
                ->exists();
        if ($exists) {
            return false;
        }

        $action = null;
        if (! empty($record['action'])) {
            $action = strtolower((string) $record['action']) === 'time_out' ? 'time_out' : 'time_in';
        }

        // device_id must reference a biometric_devices row (or NULL). Never a
        // biometric_agent id — those live in a separate table.
        $resolvedDeviceId = null;
        if ($deviceId !== null) {
            $resolvedDeviceId = BiometricDevice::whereKey($deviceId)->value('id');
        }

        AttendanceLog::create([
            'employee_id' => $employee->id,
            'fingerprint_id' => $employee->fingerprint_id,
            'punch_time' => $punchTime,
            'source_key' => $sourceKey,
            'action' => $action,
            'device_id' => $resolvedDeviceId,
            'source' => $source,
        ]);

        try {
            app(AttendanceService::class)->processDay($employee, $punchTime->copy());
        } catch (\Throwable $e) {
            Log::error('ZKTeco: processDay error: '.$e->getMessage());
        }

        return true;
    }
}
