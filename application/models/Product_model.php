<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_model extends CI_Model
{
    public function get_list_product()
    {
        $this->db->select('product.*, model.code as model_code, model.name as model_name, 
            created_user.name as created_by_name, updated_user.name as updated_by_name');
        $this->db->from('product');
        $this->db->join('model', 'model.id = product.modelid');
        $this->db->join('users as created_user', 'created_user.id = product.created_by', 'left');
        $this->db->join('users as updated_user', 'updated_user.id = product.updated_by', 'left');
        $query = $this->db->get();
        return $query->result();
    }
}
