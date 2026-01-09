<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scanbarcode extends CI_Controller
{

    public function index() {
        $this->load->view('scanbarcode/scan_barcode_modal');
    }
    public function qrcode()
    {
        $this->load->view('scanbarcode/scan_qrcode_modal');
    }

    public function result()
    {
        $barcode = $this->input->post('barcode');
        echo json_encode([
            'status' => true,
            'barcode' => $barcode
        ]);
    }
}
