<?php

use App\Models\KartuBimbingan;

if (! function_exists('get_app_info')) {
    function get_app_info($column) {
        $data = KartuBimbingan::first();
        return $data[$column] ?? '';
    }
}
