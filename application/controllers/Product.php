<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }
    public function index()
    {
        $this->check_permission('read');
        $data['title'] = 'Outlet List';
        $data['activeurl'] = 'outlet';
        $data['script_js'] = 'outlet/script_js';
        $data['can_create'] = $this->can('create');
        $data['can_update'] = $this->can('update');
        $data['can_delete'] = $this->can('delete');
        $data['hide_actions'] = !($data['can_update'] || $data['can_delete']);
        $data['outlets'] = $this->Outlet_model->get_list_outlet();
        loadview('outlet/index', $data);
    }
}
