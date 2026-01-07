<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modules extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modules_model');
    }
    public function index()
    {
        $this->check_permission('read');
        $data['title'] = 'Modules List';
        $data['activeurl'] = 'modules';
        $data['script_js'] = 'modules/script_js';
        $data['can_create'] = $this->can('create');
        $data['can_update'] = $this->can('update');
        $data['can_delete'] = $this->can('delete');
        $data['hide_actions'] = !($data['can_update'] || $data['can_delete']);
        $data['menus'] = $this->Modules_model->get_modules_tree();
        loadview('modules/index', $data);
    }
    public function add_module()
    {
        $this->ajax_only();
        $data['modules'] = $this->Modules_model->get_parent_modules();
        $this->load->view('modules/add_modules_modal', $data);
    }
    public function add()
    {
        $this->ajax_only();
        $this->db->trans_start();
        $name = $this->input->post('name', true);
        $url = $this->input->post('url', true);
        $parentid = $this->input->post('parentid', true);
        $sort = $this->input->post('sort', true);
        $icon = $this->input->post('icon', true);
        $data_url = $this->input->post('data_url', true);
        $active = ($this->input->post('active', true) !== null) ? 1 : 0;
        $data = [
            'name'       => $name,
            'url'        => $url,
            'parentid'   => $parentid,
            'sort'       => $sort,
            'active'     => $active,
            'icon'       => $icon,
            'data_url'   => $data_url,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('user_id'),
        ];
        $this->db->insert('modules', $data);
        $module_id = $this->db->insert_id();
        log_action($data, 'modules', 'id', $module_id, 'insert');
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Module added successfully.']);
    }
    public function edit_module($module_id= null)
    {
        $this->ajax_only();
        $module =  $this->db->get_where('modules', ['id' => $module_id])->row();
        $data['module'] = $module;
        $data['modules'] = $this->Modules_model->get_parent_modules();
        $this->load->view('modules/edit_modules_modal', $data);
    }
    public function edit()
    {
        $this->ajax_only();
        $this->db->trans_start();
        $module_id = $this->input->post('module_id', true);
        $name = $this->input->post('name', true);
        $url = $this->input->post('url', true);
        $parentid = $this->input->post('parentid', true);
        $sort = $this->input->post('sort', true);
        $icon = $this->input->post('icon', true);
        $data_url = $this->input->post('data_url', true);
        $active = ($this->input->post('active', true) !== null) ? 1 : 0;
        $data = [
            'name'       => $name,
            'url'        => $url,
            'parentid'   => $parentid,
            'sort'       => $sort,
            'active'     => $active,
            'icon'       => $icon,
            'data_url'   => $data_url,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id'),
        ];
        log_action($data, 'modules', 'id', $module_id, 'update');
        $this->db->where('id', $module_id);
        $this->db->update('modules', $data);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Module updated successfully.']);
    }
    public function delete($module_id= null)
    {
        $this->ajax_only();
        $this->db->trans_start();
        $data = [
            'deleted'    => 1,
            'active'     => 0,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id'),
        ];
        log_action($data, 'modules', 'id', $module_id, 'delete');
        $this->db->where('id', $module_id);
        $this->db->update('modules', $data);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Module deleted successfully.']);
    }
}
