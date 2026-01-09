<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_stock_model extends CI_Model
{
    public function getStockByBarcode($barcode)
    {
        $this->db->select('ps.*, w.code as warehouse_code, w.name as warehouse_name, o.code as outlet_code,o.name as outlet_name');
        $this->db->from('product_stock ps');
        $this->db->join('warehouse w', 'ps.warehouse = w.code');
        $this->db->join('outlet o', 'w.outlet = o.code');
        $this->db->where('ps.sku', $barcode);
        $query = $this->db->get();
        $sql = $query->result();
        if ($sql) {
            $result = [];
            foreach ($sql as $row) {
                $outlet_code = $row->outlet_code;
                if (!isset($result[$outlet_code])) {
                    $result[$outlet_code] = [
                        'outlet_code' => $outlet_code,
                        'outlet_name' => $row->outlet_name,
                        'warehouse' => []
                    ];
                }
                $result[$outlet_code]['warehouse'][] = [
                    'warehouse_code' => $row->warehouse_code,
                    'warehouse_name' => $row->warehouse_name,
                    'stock' => $row->qty
                ];
            }
            return $result;
        } else {
            return [];
        }
    }
}
