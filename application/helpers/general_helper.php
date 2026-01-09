<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
function pre($data, $next = false)
{
    echo '<pre>';
    print_r($data);
    echo "\n";
    echo '</pre>';
    if (!$next) {
        exit;
    }
}
function loadview($viewfile, $data = [])
{
    $CI = get_instance();
    $data['main'] = $viewfile;
    $CI->load->view('layouts/master', $data);
}
function ymd($date)
{
    return date('Y-m-d', strtotime($date));
}
function dmy($date)
{
    return date('d-m-Y', strtotime($date));
}


if (!function_exists('amount')) {
    function amount($value)
    {
        if ($value === null || $value === '') {
            return 0;
        }

        // Hapus spasi
        $value = trim($value);

        /**
         * Format valid:
         * - 1.234,56
         * - 123,45
         * - 1.234
         */
        if (strpos($value, ',') !== false) {
            // Hapus thousand separator titik
            $value = str_replace(',', '', $value);

            // Ambil bagian sebelum koma (decimal)
            // $value = explode(',', $value)[0];
        }

        return $value;
    }
}
