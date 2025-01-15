<?php
use App\Models\Setting;

if (! function_exists('setting')) {
    function setting($column) {
        $data = Setting::first();
        return $data[$column] ?? '';
    }
}
if (!function_exists('get_permission_group_name')) {
    function get_permission_group_name($string)
    {
        $pattern = "/(?:akses|show|tambah|edit|hapus|give|approve|export)\s+(.*)/i";

        if (preg_match($pattern, $string, $matches)) {
            $kalimatSetelah = trim($matches[1]);
            return $kalimatSetelah; // Output: sumber listrik
        } else {
            return "Tidak ada kalimat yang cocok";
        }
    }
}
