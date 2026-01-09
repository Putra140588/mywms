<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Exchangerate extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Exchangerate_model');
        $this->load->model('Currency_model');
    }

    public function index()
    {
        $this->check_permission('read');
        $data['title'] = 'Exchange Rate List';
        $data['activeurl'] = 'exchangerate';
        $data['script_js'] = 'exchangerate/script_js';
        $data['can_create'] = $this->can('create');
        $data['can_update'] = $this->can('update');
        $data['can_delete'] = $this->can('delete');
        $data['hide_actions'] = !($data['can_update'] || $data['can_delete']);
        $data['exchangerates'] = $this->Exchangerate_model->get_all_rates();
        loadview('exchangerate/index', $data);
    }

    public function add_exchangerate()
    {
        $this->ajax_only();
        $data['currencies'] = $this->Currency_model->get_all_currencies();
        $this->load->view('exchangerate/add_exchangerate_modal', $data);
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $rate_data = array(
                'currency_from' => $this->input->post('currency_from'),
                'currency_to' => $this->input->post('currency_to'),
                'rate' => $this->input->post('rate'),
            );
            $this->Exchangerate_model->update_rate($id, $rate_data);
            redirect('exchangerate');
        } else {
            $data['rate'] = $this->Exchangerate_model->get_rate($id);
            $this->load->view('exchangerate/edit', $data);
        }
    }

    public function delete($id)
    {
        $this->Exchangerate_model->delete_rate($id);
        redirect('exchangerate');
    }
    public function add()
    {
        $this->ajax_only();
        $this->db->trans_start();
        $curr_foreign = $this->input->post('curr_foreign', true);
        $curr_base = $this->input->post('curr_base', true);
        $rate = amount($this->input->post('rate', true));
        $rate_date = ymd($this->input->post('rate_date', true));
        $rate_time = $this->input->post('rate_time', true);
        $active = $this->input->post('active', true) ? 1 : 0;
        $data = array(
            'curr_foreign' => $curr_foreign,
            'curr_base' => $curr_base,
            'rate' => $rate,
            'rate_date' => $rate_date,
            'rate_time' => $rate_time,
            'active' => $active,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('user_id'),
        );
        $this->db->insert('exchange_rate', $data);
        $exchangerate_id = $this->db->insert_id();
        log_action($data, 'exchange_rate', 'id', $exchangerate_id, 'insert');
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Exchange rate added successfully.']);
    }
}
