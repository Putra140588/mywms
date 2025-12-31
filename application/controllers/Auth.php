<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // protected $session_timeout = 20; // 20detik
    protected $session_timeout = 1800; // 30 menit
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }
    public function check_session()
    {
        $this->ajax_only();
        if (!$this->session->userdata('logged_in')) {
            echo json_encode(['expired' => true]);
            return;
        }
        $last = $this->session->userdata('last_activity');
        $remaining = $this->session_timeout - (time() - $last);
        echo json_encode([
            'expired'   => false,
            'remaining' => $remaining
        ]);
    }

    public function extend_session()
    {
        $this->ajax_only();
        if ($this->session->userdata('logged_in')) {
            $this->session->set_userdata('last_activity', time());
            echo json_encode(['status' => 'extended']);
        }
    }
    public function logout()
    {
        $this->auth_model->logout();
        redirect('login');
    }
    public function ajax_only()
    {
        if (!$this->input->is_ajax_request()) {
            $msg = 'Invalid request method.';
            $this->session->set_flashdata('danger', $msg);
            echo json_encode(['status' => 'error', 'message' => $msg]);
            exit;
        }
    }
}
