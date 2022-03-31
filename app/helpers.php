<?php

use App\Models\Option;

if (! function_exists('option')) {
    function option($key, $default = null) {
        return Option::get($key, $default);
    }
}
      

if (! function_exists('calculate_trend')) {
    function calculate_trend($old, $new) {
        if ($old == 0 && $new > 0) return ['-', 100];

        if ($old == $new) return ['+', 0];

        $percent = (($old - $new) / $old) * 100;

        return [$percent >= 0 ? '+' : '-', round(abs($percent))];
    }
}