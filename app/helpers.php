<?php

use App\Models\Option;

if (! function_exists('option')) {
    function option($key, $default = null) {
        return Option::get($key, $default);
    }
}