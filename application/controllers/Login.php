<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }
    public function index()
    {
        is_ready_logged_in();
        $this->load->view('login');
    }
    public function check()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $check_login = $this->auth_model->login($username, $password);
        if ($check_login) {
            echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            return;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
            return;
        }
    }
}
