<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Roles_model');
        $this->load->model('Modules_model');
        $this->load->model('Permission_model');
    }
    public function index()
    {

        $this->check_permission('read');
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
        $this->ajax_only();
        $this->load->view('roles/add_role_modal');
    }
    public function add()
    {
        $this->ajax_only();
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
        $this->ajax_only();
        $role =  $this->db->get_where('roles', ['id' => $role_id])->row();
        $data['role'] = $role;
        $data['login_role_id'] = $this->session->userdata('role_id');
        $this->load->view('roles/edit_role_modal', $data);
    }
    public function edit()
    {
        $this->ajax_only();
        $this->db->trans_start();
        $role_id = $this->input->post('role_id', true);
        $role_name = $this->input->post('role_name', true);
        $active = ($this->input->post('active', true) !== null) ? 1 : 0;
        $login_role_id = $this->session->userdata('role_id');
        if ($role_id == $login_role_id) {
            echo json_encode(['status' => 'error', 'message' => 'You cannot modify your own role.']);
            return;
        }
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
        $this->ajax_only();
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
        $this->ajax_only();
        $data['login_role_id'] = $this->session->userdata('role_id');
        $data['role'] = $this->Roles_model->get_role_by_id($role_id);
        $data['modules'] = $this->Modules_model->get_modules_tree();
        $data['permissions'] = $this->db->get('permissions')->result();
        $data['role_permissions'] = $this->Permission_model->get_role_permissions($role_id);
        $this->load->view('roles/edit_role_access_modal', $data);
    }
    public function update_access()
    {
        $this->ajax_only();
        $permissions_input = $this->input->post('permissions', true);
        $role_id = $this->input->post('role_id', true);
        $login_role_id = $this->session->userdata('role_id');
        if (!$role_id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Role ID is required.'
            ]);
            return;
        }
        if ($role_id == $login_role_id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'You cannot modify permissions for your own role.'
            ]);
            return;
        }

        $this->db->trans_start();

        $data_role_permissions = [];
        $data_role_access = [];
        if ($permissions_input) {
            foreach ($permissions_input as $module_id => $perms) {
                $data_role_permissions[] = [
                    'role_id'   => $role_id,
                    'module_id' => $module_id,
                    'can_create' => in_array('create', $perms) ? 1 : 0,
                    'can_read'  => in_array('read', $perms) ? 1 : 0,
                    'can_update' => in_array('update', $perms) ? 1 : 0,
                    'can_delete' => in_array('delete', $perms) ? 1 : 0,
                    'can_approve' => in_array('approve', $perms) ? 1 : 0,
                    'can_export' => in_array('export', $perms) ? 1 : 0,
                    'can_print' => in_array('print', $perms) ? 1 : 0,
                    'can_import' => in_array('import', $perms) ? 1 : 0,
                    'can_publish' => in_array('publish', $perms) ? 1 : 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $this->session->userdata('user_id'),
                ];
                $data_role_access[] = [
                    'role_id'   => $role_id,
                    'module_id' => $module_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => $this->session->userdata('user_id'),
                ];
            }
        }
        log_action_delete($data_role_permissions, 'role_permissions', 'role_id', $role_id, 'delete');
        log_action_delete($data_role_access, 'role_access', 'role_id', $role_id, 'delete');
        $this->Permission_model->reset_role_access($role_id);
        $this->Permission_model->reset_role_permissions($role_id);
        if ($permissions_input) {
            $this->Permission_model->save_role_permission($data_role_permissions);
            $this->Permission_model->save_role_access($data_role_access);
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update role permissions.'
            ]);
        } else {
            $this->db->trans_complete();
            echo json_encode([
                'status' => 'success',
                'message' => 'Role permissions updated successfully.'
            ]);
        }
    }
}
