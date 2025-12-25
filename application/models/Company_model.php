<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_company()
    {
        $this->db->where('active', 1);
        $this->db->where('deleted', 0);
        $this->db->order_by('id', 'ASC');
        return $this->db->get('company')->result();
    }
}
