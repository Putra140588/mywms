<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modules_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_modules_tree()
    {
        $query = $this->db->where('active', 1)
            ->order_by('parentid ASC, sort ASC')
            ->get('modules');
        $modules = $query->result_array();

        return $this->build_tree($modules);
    }
    private function build_tree(array $modules, $parent_id = 0)
    {
        $branch = [];

        foreach ($modules as $module) {
            if ((int)$module['parentid'] === (int)$parent_id) {
                $children = $this->build_tree($modules, $module['id']);
                if ($children) {
                    $module['child'] = $children;
                } else {
                    $module['child'] = [];
                }
                $branch[] = $module;
            }
        }

        return $branch;
    }
    public function get_modules_by_role($role_id)
    {
        $this->db->select('m.*');
        $this->db->from('modules m');
        $this->db->join('role_access ra', 'ra.module_id = m.id');
        $this->db->where('ra.role_id', $role_id);
        $this->db->where('m.active', 1);
        $this->db->order_by('m.parentid, m.sort');

        return $this->db->get()->result_array();
    }
    public function get_modules_tree_by_role($role_id)
    {
        $modules = $this->get_modules_by_role($role_id);
        return $this->build_tree($modules);
    }
}
