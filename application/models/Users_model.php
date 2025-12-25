<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_users($joined_date_range = null)
    {
        $this->db->select('users.*, roles.name as role_name, company.name as company_name');
        $this->db->from('users');
        $this->db->join('roles', 'users.role_id = roles.id', 'left');
        $this->db->join('company', 'users.companycode = company.code', 'left');
        if ($joined_date_range !== null) {
            // Parse the joined_date_range to get start_date and end_date
            list($start_date, $end_date) = explode(' - ', $joined_date_range);
            $start_date = ymd($start_date);
            $end_date = ymd($end_date);
            $this->db->where('users.created_at >=', $start_date);
            $this->db->where('users.created_at <=', $end_date);
        }
        $this->db->where('users.deleted', 0);
        $this->db->order_by('users.id', 'DESC');
        return $this->db->get()->result();
    }
    public function get_user_by($user_id)
    {
        $this->db->select('users.*, roles.name as role_name, company.name as company_name');
        $this->db->from('users');
        $this->db->join('roles', 'users.role_id = roles.id', 'left');
        $this->db->join('company', 'users.companycode = company.code', 'left');
        $this->db->where('users.id', $user_id);
        return $this->db->get()->row();
    }
}
