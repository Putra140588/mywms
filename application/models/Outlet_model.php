<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outlet_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_outlet()
    {
        $this->db->where('active', 1);
        $this->db->where('deleted', 0);
        $this->db->order_by('id', 'ASC');
        return $this->db->get('outlet')->result();
    }
    public function get_list_outlet()
    {
        $this->db->where('deleted', 0);
        $this->db->order_by('id', 'ASC');
        return $this->db->get('outlet')->result();
    }
    public function get_outlet_by($outlet_id)
    {
        $this->db->where('id', $outlet_id);
        $this->db->where('deleted', 0);
        return $this->db->get('outlet')->row();
    }
}
