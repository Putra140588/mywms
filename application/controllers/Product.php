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
        $data['title'] = 'Product List';
        $data['activeurl'] = 'product';
        $data['script_js'] = 'product/script_js';
        $data['can_create'] = $this->can('create');
        $data['can_update'] = $this->can('update');
        $data['can_delete'] = $this->can('delete');
        $data['hide_actions'] = !($data['can_update'] || $data['can_delete']);
        $data['products'] = $this->Product_model->get_list_product();
        loadview('product/index', $data);
    }
    public function add_product()
    {
        $this->ajax_only();
        $this->load->view('product/add_product_modal');
    }
}
