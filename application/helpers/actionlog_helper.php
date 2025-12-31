<?php
defined('BASEPATH') or exit('No direct script access allowed');

function log_action($newdata, $table, $keyfield, $id, $action)
{
    $CI = &get_instance();
    $CI->load->model('Actionlog_model');
    $CI->Actionlog_model->GetOldNewData($newdata, $table, $keyfield, $id, $action);
}
function log_action_delete($newdata, $table, $keyfield, $id, $action)
{
    $CI = &get_instance();
    $CI->load->model('Actionlog_model');
    $CI->Actionlog_model->GetOldNewDataDelete($newdata, $table, $keyfield, $id, $action);
}
