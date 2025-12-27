<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->check_permission('read');
        $data['title'] = 'Dashboard';
        $data['activeurl'] = 'dashboard';
        loadview('dashboard/index', $data);
    }
    public function clear_cache()
    {
        //hapus semua cache
        $this->load->driver('cache');
        $this->cache->clean();
        $this->session->set_flashdata('success', 'Cache cleared successfully.');
        redirect('dashboard');
    }
}
