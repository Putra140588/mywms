<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_logged_in()
{
    $CI = &get_instance();
    // Session check
    if (!$CI->session->userdata('adminid')) {
        // destroy session (optional but recommended)
        $CI->session->sess_destroy();

        redirect('login'); // change to your login controller
        exit;
    }
}
function is_ready_logged_in()
{
    $CI = &get_instance();
    // Session check
    if ($CI->session->userdata('adminid')) {
        redirect('index'); // change to your login controller
        exit;
    }
}
