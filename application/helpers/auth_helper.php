<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_logged_in()
{
    $CI = &get_instance();
    // Session check
    if (!$CI->session->userdata('logged_in')) {
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
    if ($CI->session->userdata('logged_in')) {
        redirect('dashboard'); // change to your login controller
        exit;
    }
}
function is_superadmin()
{
    $CI = &get_instance();
    return (int)$CI->session->userdata('role_id') === 1;
}
function ajax_only()
{
    $CI = &get_instance();
    // Check if request is AJAX
    if (!$CI->input->is_ajax_request()) {
        $CI->session->set_flashdata('danger', 'Invalid request method.');
        redirect('dashboard');
        exit;
    }
}
