<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Exchangerate_model extends CI_Model
{
    public function get_all_rates()
    {

        $this->db->select('exchange_rate.*, u1.name as created_by_name, u2.name as updated_by_name');
        $this->db->from('exchange_rate');
        $this->db->join('users as u1', 'exchange_rate.created_by = u1.id', 'left');
        $this->db->join('users as u2', 'exchange_rate.updated_by = u2.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
}
