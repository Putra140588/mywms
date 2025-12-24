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
