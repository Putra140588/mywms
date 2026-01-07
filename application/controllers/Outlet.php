<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outlet extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Outlet_model');
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
    public function add_outlet()
    {
        $this->ajax_only();
        $this->load->view('outlet/add_outlet_modal');
    }
    public function add()
    {
        $this->ajax_only();
        $this->db->trans_start();
        $code = $this->input->post('code', true);
        $name = $this->input->post('name', true);
        $active = ($this->input->post('active', true) !== null) ? 1 : 0;
        $check_code = $this->db->get_where('outlet', ['code' => $code])->row();
        if ($check_code) {
            echo json_encode(['status' => 'error', 'message' => 'The outlet code already exists or has been used before. Please enter a different code.']);
            return;
        }
        $data = [
            'code'       => $code,
            'name'       => $name,
            'active'     => $active,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('user_id'),
        ];
        $this->db->insert('outlet', $data);
        $outlet_id = $this->db->insert_id();
        log_action($data, 'outlet', 'id', $outlet_id, 'insert');
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Outlet added successfully.']);
    }
    public function edit_outlet($outlet_id = null)
    {
        $this->ajax_only();
        $data['outlet'] = $this->Outlet_model->get_outlet_by($outlet_id);
        $this->load->view('outlet/edit_outlet_modal', $data);
    }
    public function edit()
    {
        $this->ajax_only();
        $this->db->trans_start();
        $outlet_id = $this->input->post('id', true);
        $name = $this->input->post('name', true);
        $active = ($this->input->post('active', true) !== null) ? 1 : 0;
        $data = [
            'name'       => $name,
            'active'     => $active,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id'),
        ];
        log_action($data, 'outlet', 'id', $outlet_id, 'update');
        $this->db->where('id', $outlet_id);
        $this->db->update('outlet', $data);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Outlet updated successfully.']);
    }
    public function delete($outlet_id = null)
    {
        $this->ajax_only();
        $this->db->trans_start();
        $data = [
            'deleted'    => 1,
            'active'     => 0,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id'),
        ];
        log_action($data, 'outlet', 'id', $outlet_id, 'delete');
        $this->db->where('id', $outlet_id);
        $this->db->update('outlet', $data);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Outlet deleted successfully.']);
    }
}
