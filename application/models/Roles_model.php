<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_role_by_id($role_id)
    {
        return $this->db->get_where('roles', ['id' => $role_id])->row();
    }
    public function get_all_roles()
    {
        $this->db->select('roles.*, creator.name as creator_name, updater.name as updater_name');
        $this->db->from('roles');
        $this->db->join('users as creator', 'creator.id = roles.created_by', 'left');
        $this->db->join('users as updater', 'updater.id = roles.updated_by', 'left');
        $this->db->where('roles.deleted', 0);
        $this->db->order_by('roles.id', 'DESC');
        return $this->db->get()->result();
    }
    public function get_modules()
    {
        $this->db->select('rp.* , m.url, m.name as module_name');
        $this->db->from('role_perm issions rp');
        $this->db->join('modules m', 'm.id = rp.module_id', 'left');
        $this->db->where('rp.role_id', $role_id);
        return $this->db->get()->result_array();
    }
}
