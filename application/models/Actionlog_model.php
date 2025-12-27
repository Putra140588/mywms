<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Actionlog_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function log_action($action = null, $table = null, $code = null, $logdata = null)
    {
        $user_id = $this->session->userdata('user_id');
        $old_data = (isset($logdata['old_data']) && $logdata['old_data'] !== null) ? json_encode($logdata['old_data']) : null;
        $new_data = (isset($logdata['new_data']) && $logdata['new_data'] !== null) ? json_encode($logdata['new_data']) : null;
        $data['action'] = $action;
        $data['url'] = (isset($url) && $url !== null) ? $url : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $data['associatedwith'] = $table;
        $data['associatedcode'] = $code;
        $data['old_data'] = $old_data;
        $data['new_data'] = $new_data;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $user_id;
        $data['ip_address'] = $this->input->ip_address();
        $this->db->insert('action_logs', $data);
    }
    public function GetOldNewData($newdata, $table, $keyfield, $id, $action)
    {
        $fields = array_keys($newdata);
        if ($action === 'insert') {
            $old_data = null;
            $new_data = $newdata;
            $new_data[$keyfield] = $id;
        } else {
            $selectstr = "SELECT ";
            $selectstr .= implode(', ', $fields) . ", $keyfield FROM $table WHERE $keyfield = '$id' ";
            $query = $this->db->query($selectstr)->row_array();

            $old_data = array();
            $new_data = array();
            if ($query) {
                foreach ($fields as $field) {
                    $old_value = isset($query[$field]) ? $query[$field] : null;
                    $new_value = isset($newdata[$field]) ? $newdata[$field] : null;
                    if (strcmp((string)$old_value, (string)$new_value) !== 0) {
                        $old_data[$field] = $old_value;
                        $new_data[$field] = $new_value;
                    }
                }
                // Add keyfield to both arrays
                $old_data[$keyfield] = isset($query[$keyfield]) ? $query[$keyfield] : null;
                $new_data[$keyfield] = $id;
            }
        }
        $data =  array('old_data' => $old_data, 'new_data' => $new_data);
        $this->log_action($action, $table, $id, $data);
        return true;
    }
}
