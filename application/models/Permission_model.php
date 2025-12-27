<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permission_model extends CI_Model
{
    public function get_permissions($role_id, $module_url)
    {
        return $this->db
            ->select('rp.*')
            ->from('modules m')
            ->join('role_permissions rp', 'rp.module_id = m.id')
            ->where('rp.role_id', $role_id)
            ->where('m.url', $module_url)
            ->get()
            ->row_array();
    }
    public function get_role_permissions($role_id)
    {
        $this->db->from('role_permissions');
        $this->db->where('role_id', $role_id);

        $rows = $this->db->get()->result_array();

        $result = [];
        foreach ($rows as $row) {
            $module_id = $row['module_id'];

            unset($row['role_id'], $row['module_id']); // buang key tidak perlu

            $result[$module_id] = $row;
        }

        return $result;
    }
}
