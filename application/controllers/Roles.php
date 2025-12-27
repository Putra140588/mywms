<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Roles_model');
        $this->load->model('Modules_model');
    }
    public function index()
    {
        $data['title'] = 'Roles List';
        $data['activeurl'] = 'roles';
        $data['script_js'] = 'roles/script_js';
        $data['can_create'] = $this->can('create');
        $data['can_update'] = $this->can('update');
        $data['can_delete'] = $this->can('delete');
        $data['hide_actions'] = !($data['can_update'] || $data['can_delete']);
        $data['sql'] = $this->Roles_model->get_all_roles();
        loadview('roles/index', $data);
    }
    public function add_role()
    {
        $this->load->view('roles/add_role_modal');
    }
    public function add()
    {
        $this->db->trans_start();
        $role_name = $this->input->post('role_name', true);
        $active = ($this->input->post('active', true) !== null) ? 1 : 0;
        $data = [
            'name'       => $role_name,
            'active'     => $active,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('user_id'),
        ];
        $this->db->insert('roles', $data);
        $role_id = $this->db->insert_id();
        log_action($data, 'roles', 'id', $role_id, 'insert');
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Role added successfully.']);
    }
    public function edit_role($role_id)
    {
        $role =  $this->db->get_where('roles', ['id' => $role_id])->row();
        $data['role'] = $role;
        $this->load->view('roles/edit_role_modal', $data);
    }
    public function edit()
    {
        $this->db->trans_start();
        $role_id = $this->input->post('role_id', true);
        $role_name = $this->input->post('role_name', true);
        $active = ($this->input->post('active', true) !== null) ? 1 : 0;
        $data = [
            'name'       => $role_name,
            'active'     => $active,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id'),
        ];
        log_action($data, 'roles', 'id', $role_id, 'update');
        $this->db->where('id', $role_id);
        $this->db->update('roles', $data);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Role updated successfully.']);
    }
    public function delete_role($role_id)
    {
        $this->db->trans_start();
        $check_role = $this->db->get_where('users', ['role_id' => $role_id, 'deleted' => 0])->row();
        if ($check_role) {
            echo json_encode(['status' => 'error', 'message' => 'Cannot delete this role because it is assigned to one or more users.']);
            return;
        }
        if ($role_id == 1) {
            echo json_encode(['status' => 'error', 'message' => 'Cannot delete the Superadmin role.']);
            return;
        }
        $data = [
            'active'     => 0,
            'deleted'    => 1,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('user_id'),
        ];
        log_action($data, 'roles', 'id', $role_id, 'delete');
        $this->db->where('id', $role_id);
        $this->db->update('roles', $data);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'Role deleted successfully.']);
    }
    public function edit_role_access($role_id)
    {
        $data['role'] = $this->Roles_model->get_role_by_id($role_id);
        $data['modules'] = $this->Modules_model->get_modules_tree();
        $data['permissions'] = $this->db->get('permissions')->result();
        $data['role_permissions'] = $this->Permission_model->get_role_permissions($role_id);
        $this->load->view('roles/edit_role_access_modal', $data);
    }
}
