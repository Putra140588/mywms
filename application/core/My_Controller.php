<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    //protected $session_timeout = 20; // 20detik
    protected $session_timeout = 1800; // 30 menit
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modules_model');
        $this->load->driver('cache');
        //  $this->check_access('users');

        // Melewati pengecekan untuk Auth controller
        if ($this->router->fetch_class() === 'auth') {
            return;
        }

        // Belum login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $now  = time();
        $last = $this->session->userdata('last_activity');
        // SESSION EXPIRED
        if ($last && ($now - $last) > $this->session_timeout) {
            $this->session->sess_destroy();
            // AJAX
            if ($this->input->is_ajax_request()) {
                $this->output
                    ->set_status_header(401)
                    ->set_output(json_encode(['status' => 'expired']))
                    ->_display();
                exit;
            }
            redirect('login?expired=1');
        }
        //UPDATE SETIAP REQUEST
        $this->session->set_userdata('last_activity', $now);


        /**
         * LOAD MODULES FOR SUPERADMIN
         */

        if ($this->is_superadmin()) {
            $cache_key = 'sidebar_modules_superadmin';
            $modules = $this->cache->file->get($cache_key);
            if (!$modules) {
                $modules = $this->Modules_model->get_modules_tree();
                $this->cache->file->save($cache_key, $modules, 3600);
            }
            $can_export = true;
        } else {
            /**
             * ROLE ACCESS MODULES SELAIN SUPERADMIN
             */
            $role_id = $this->session->userdata('role_id');
            $cache_key = 'sidebar_modules_role_' . $role_id;
            $modules = $this->cache->file->get($cache_key);
            if (!$modules) {
                $modules = $this->Modules_model->get_modules_tree_by_role($role_id);
                $this->cache->file->save($cache_key, $modules, 3600);
            }
            $can_export = $this->can('export');
        }
        //render to all views
        $this->load->vars(['modules' => $modules, 'can_export' => $can_export]);
    }

    protected function is_superadmin()
    {
        return (int)$this->session->userdata('role_id') === 1;
    }
    protected function check_access($module_url)
    {
        // SUPERADMIN BYPASS
        if ($this->is_superadmin()) {
            return true;
        }
        $role_id = (int) $this->session->userdata('role_id');
        $this->db->from('modules m');
        $this->db->join('role_access ra', 'ra.module_id = m.id');
        $this->db->where('ra.role_id', $role_id);
        $this->db->where('m.url', $module_url);

        if ($this->db->count_all_results() == 0) {
            $this->access_denied();
        }
    }
    protected function check_permission($action)
    {
        // SUPERADMIN BYPASS
        if ($this->is_superadmin()) {
            return true;
        }
        $role_id = (int)$this->session->userdata('role_id');
        $module = strtolower($this->router->fetch_class()); //get class name dari controller yg diakses

        $this->load->model('Permission_model');
        $perm = $this->Permission_model->get_permissions($role_id, $module);
        if (!$perm || empty($perm['can_' . $action]) || $perm['can_' . $action] != 1) {
            $this->access_denied();
        }
    }
    protected function access_denied()
    {
        // render view jadi STRING
        $html = $this->load->view('layouts/master', [
            'title' => 'Access Denied',
            'main' => 'errors/access_denied'
        ], true);

        // kirim output + status
        $this->output
            ->set_status_header(403)
            ->set_output($html)
            ->_display();

        exit;
    }
    protected function can($action, $module = null)
    {
        //SUPERADMIN BYPASS
        if ($this->is_superadmin()) {
            return true;
        }
        $role_id = (int) $this->session->userdata('role_id');

        // Default module = controller
        if ($module === null) {
            $module = strtolower($this->router->fetch_class());
        }

        static $permission_cache = [];

        $cache_key = $role_id . '_' . $module;

        if (!isset($permission_cache[$cache_key])) {
            $this->load->model('Permission_model');
            $permission_cache[$cache_key] =
                $this->Permission_model->get_permissions($role_id, $module);
        }

        $perm = $permission_cache[$cache_key];

        return ($perm && !empty($perm['can_' . $action]) && $perm['can_' . $action] == 1);
    }
    protected function ajax_only()
    {
        if (!$this->input->is_ajax_request()) {
            $this->session->set_flashdata('danger', 'Invalid request method.');
            $module = strtolower($this->router->fetch_class());
            redirect($module);
            exit;
        }
    }
}
