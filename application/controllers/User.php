<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['sql'] = $this->db->get('users')->result();
        $data['activeurl'] = 'user';
        loadview('users/index', $data);
    }
}
