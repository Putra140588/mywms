<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Model
{
    public function get_list_product()
    {
        $query = $this->db->get('product');
        return $query->result();
    }
}
