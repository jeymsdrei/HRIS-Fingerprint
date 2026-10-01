<?php

if (! function_exists('hm')) {
    /**
     * Format a raw minutes value as hours + minutes (e.g. 95 -> "1h 35m").
     */
    function hm(int $minutes): string
    {
        $minutes = max(0, $minutes);
        $h = intdiv($minutes, 60);
        $m = $minutes % 60;

        if ($h > 0 && $m > 0) {
            return "{$h}h {$m}m";
        }
        if ($h > 0) {
            return "{$h}h";
        }

        return "{$m}m";
    }
}
