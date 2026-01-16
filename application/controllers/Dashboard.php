<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_stock_model');
    }
    public function index()
    {
        $this->check_permission('read');
        $data['title'] = 'Scan Barcode';
        $data['activeurl'] = 'dashboard';
        $data['script_js'] = 'dashboard/script_js';
        $data['can_create'] = $this->can('create');
        $data['can_update'] = $this->can('update');
        $data['can_delete'] = $this->can('delete');
        loadview('dashboard/scanproduct', $data);
    }
    public function clear_cache()
    {
        //hapus semua cache
        $this->load->driver('cache');
        $this->cache->clean();
        $this->session->set_flashdata('success', 'Cache cleared successfully.');
        redirect('dashboard');
    }
    public function scanproduct()
    {
        $this->ajax_only();
        $this->load->view('dashboard/scanproduct_modal');
    }
    public function ScanResult()
    {

        $barcode = $this->input->post('barcode', true);
        $stock = $this->Product_stock_model->getStockByBarcode($barcode);
        if (empty($stock)) {
            echo json_encode([
                'status' => 'error',
                'message' => "Product Not Found!"
            ]);
            return;
        }
        $html = "";
        $data['stock'] = $stock;
        $data['barcode'] = $barcode;
        $html .= $this->load->view('dashboard/scanproduct_result', $data, true);
        echo json_encode([
            'status' => 'success',
            'html' => $html
        ]);
    }
}
