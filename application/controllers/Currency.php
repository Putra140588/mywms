<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Currency extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Currency_model');
    }
    public function index()
    {
        $this->check_permission('read');
        $data['title'] = 'Currency List';
        $data['activeurl'] = 'currency';
        $data['script_js'] = 'currency/script_js';
        $data['can_create'] = $this->can('create');
        $data['can_update'] = $this->can('update');
        $data['can_delete'] = $this->can('delete');
        $data['hide_actions'] = !($data['can_update'] || $data['can_delete']);
        $data['currencies'] = $this->Currency_model->get_all_currencies();
        loadview('currency/index', $data);
    }
    public function add_currency()
    {
        $this->ajax_only();
        $this->load->view('currency/add_currency_modal');
    }
    public function add()
    {
        $this->ajax_only();
        $this->db->trans_start();
        $code = $this->input->post('code');
        $name = $this->input->post('name');
        $symbol = $this->input->post('symbol');
        $active = $this->input->post('active') ? 1 : 0;
        $data = array(
            'code' => $code,
            'name' => $name,
            'symbol' => $symbol,
            'active' => $active,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('user_id'),
        );;
        $this->db->insert('currency', $data);
        $currency_id = $this->db->insert_id();
        log_action($data, 'currency', 'id', $currency_id, 'insert');
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Currency added successfully.']);
    }
    public function edit_currency($currency_id = null)
    {
        $this->ajax_only();
        $data['currency'] = $this->db->get_where('currency', ['id' => $currency_id])->row();
        $this->load->view('currency/edit_currency_modal', $data);
    }
    public function edit()
    {
        $this->ajax_only();
        $this->db->trans_start();
        $currency_id = $this->input->post('currency_id', true);
        $code = $this->input->post('code', true);
        $name = $this->input->post('name', true);
        $symbol = $this->input->post('symbol', true);
        $active = $this->input->post('active', true) ? 1 : 0;
        $data = array(
            'code' => $code,
            'name' => $name,
            'symbol' => $symbol,
            'active' => $active,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id'),
        );
        log_action($data, 'currency', 'id', $currency_id, 'update');
        $this->db->where('id', $currency_id);
        $this->db->update('currency', $data);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Currency updated successfully.']);
    }
    public function delete($currency_id = null)
    {
        $this->ajax_only();
        $this->db->trans_start();
        $data = [
            'deleted'    => 1,
            'active'     => 0,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id'),
        ];
        log_action($data, 'currency', 'id', $currency_id, 'delete');
        $this->db->where('id', $currency_id);
        $this->db->update('currency', $data);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Currency deleted successfully.']);
    }
}
