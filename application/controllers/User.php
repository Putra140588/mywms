<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Auth_model');
        $this->load->model('Roles_model');
        $this->load->model('Company_model');
        is_logged_in();
    }
    public function index()
    {
        $joined_date_range = $this->input->get('joined_date_range');
        $data['sql'] = $this->Users_model->get_users($joined_date_range);
        $data['title'] = 'User List';
        $data['joined_date_range'] = $joined_date_range;
        $data['activeurl'] = 'user';
        $data['script_js'] = 'users/script_js';
        loadview('users/index', $data);
    }
    public function add_user()
    {
        $data['company'] = $this->Company_model->get_company();
        $data['roles'] = $this->Roles_model->get_all_roles();
        $this->load->view('users/add_user_modal', $data);
    }
    public function add()
    {
        $this->db->trans_start();
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);
        $phone = $this->input->post('phone', true);
        $username = strtolower(trim($this->input->post('username', true)));
        $password = $this->input->post('password', true);
        $company = $this->input->post('company', true);
        $active = ($this->input->post('active', true) !== null) ? 1 : 0;
        $role_id = $this->input->post('user_role', true);

        $user = $this->db->get_where('users', ['username' => $username])->row();
        if ($user) {
            echo json_encode(['status' => 'error', 'message' => 'Username already exists, please enter another username.']);
            return;
        }

        // Cek apakah file dikirim
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path']   = FCPATH . 'assets/media/avatars/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 1024; // KB (1MB)
            $config['encrypt_name']  = TRUE; // 🔐 aman, hindari duplikat

            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $upload_data = $this->upload->data();
                $file_name   = $upload_data['file_name'];
                $input['picture'] = $file_name;
            } else {
                $error = $this->upload->display_errors('', '');
                echo json_encode(['status' => 'error', 'message' => 'Upload Error: ' . $error]);
                return;
            }
        }

        $input['name'] = $name;
        $input['email'] = $email;
        $input['phone'] = $phone;
        $input['username'] = $username;
        $input['password'] = $this->Auth_model->generate_password_hash($password);
        $input['companycode'] = $company;
        $input['active'] = $active;
        $input['role_id'] = $role_id;
        $input['created_at'] = date('Y-m-d H:i:s');
        $input['created_by'] = $this->session->userdata('user_id');
        $this->db->insert('users', $input);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'User added successfully.']);
    }
    public function edit_user($user_id)
    {
        $data['company'] = $this->Company_model->get_company();
        $data['roles'] = $this->Roles_model->get_all_roles();
        $data['user'] = $this->Users_model->get_user_by($user_id);
        $this->load->view('users/edit_user_modal', $data);
    }
    public function edit()
    {
        $this->db->trans_start();
        $user_id = $this->input->post('user_id', true);
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);
        $username = strtolower(trim($this->input->post('username', true)));
        $password = $this->input->post('password', true);
        $company = $this->input->post('company', true);
        $phone = $this->input->post('phone', true);
        $role_id = $this->input->post('user_role', true);
        $active = ($this->input->post('active') !== null) ? 1 : 0;
        $avatar_remove = $this->input->post('avatar_remove', true);
        $user = $this->Users_model->get_user_by($user_id);
        $existing_username = $this->input->post('existing_username', true);
        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'User not found.']);
            return;
        }
        if ($username !== $existing_username) {
            $check_user = $this->db->get_where('users', ['username' => $username])->row();
            if ($check_user) {
                echo json_encode(['status' => 'error', 'message' => 'Username already exists, please enter another username.']);
                return;
            }
        }

        if (!empty($avatar_remove) && empty($_FILES['file']['name'])) {
            $input['picture'] = null;
        }
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path']   = FCPATH . 'assets/media/avatars/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 1024; // KB (1MB)
            $config['encrypt_name']  = TRUE; // 🔐 aman, hindari duplikat

            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $upload_data = $this->upload->data();
                $file_name   = $upload_data['file_name'];
                $input['picture'] = $file_name;
            } else {
                $error = $this->upload->display_errors('', '');
                echo json_encode(['status' => 'error', 'message' => 'Upload Error: ' . $error]);
                return;
            }
        }
        $input['name'] = $name;
        $input['email'] = $email;
        $input['username'] = $username;
        if (!empty($password)) {
            $input['password'] = $this->Auth_model->generate_password_hash($password);
        }
        $input['companycode'] = $company;
        $input['phone'] = $phone;
        $input['role_id'] = $role_id;
        $input['active'] = $active;
        $input['updated_at'] = date('Y-m-d H:i:s');
        $input['updated_by'] = $this->session->userdata('user_id');
        $this->db->where('id', $user_id);
        $this->db->update('users', $input);
        $this->db->trans_complete();
        echo json_encode(['status' => 'success', 'message' => 'User updated successfully.']);
    }
    public function delete_user($user_id)
    {
        $user = $this->Users_model->get_user_by($user_id);
        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'User not found.']);
            return;
        }
        $this->db->update('users', ['deleted' => 1, 'active' => 0], ['id' => $user_id]);
        echo json_encode(['status' => 'success', 'message' => 'User deleted successfully.']);
    }
}
