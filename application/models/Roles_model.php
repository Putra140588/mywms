<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_roles()
    {
        $this->db->where('active', 1);
        $this->db->order_by('id', 'ASC');
        return $this->db->get('roles')->result();
    }
}
