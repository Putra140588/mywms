<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Currency_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_currencies()
    {
        $this->db->where('deleted', 0);
        $this->db->order_by('id', 'ASC');
        return $this->db->get('currency')->result();
    }
}
