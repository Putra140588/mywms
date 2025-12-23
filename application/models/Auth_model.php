<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login($username, $password)
    {
        // pre($this->generate_password_hash('123456'));
        $username = trim($username);
        $this->db->where('username', $username);
        $this->db->where('active', 1);
        $this->db->where('deleted', 0);
        $this->db->limit(1);
        $user = $this->db->get('users')->row();
        if ($user && password_verify($password, $user->password)) {
            $session_data = [
                'adminid' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'phone' => $user->phone,
                'email' => $user->email,
                'group_code' => $user->group_code,
                'companycode' => $user->companycode,
                'logged_in' => true
            ];
            $this->session->set_userdata($session_data);
            return true;
        }
        return false;
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }
    public function generate_password_hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
