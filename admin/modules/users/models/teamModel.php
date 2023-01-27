<?php

function get_all_admin(){
    return db_fetch_array("SELECT * FROM `tbl_admin`");
}

function get_account_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_admin` WHERE `ad_id` = {$id}");
}

function update_account_by_id($data, $id){
    db_update('tbl_admin', $data, "`ad_id` = {$id}");
}

function delete_account_by_id($id){
    db_delete('tbl_admin', "`ad_id` = {$id}");
}

function exits_email($email){
    $rows = db_num_rows("SELECT * FROM `tbl_admin` WHERE `email` = '{$email}'");
    if($rows > 0)
        return true;
    return false;
}

function update_reset_token($data, $email){
    db_update('tbl_admin', $data, "`email` = '{$email}'");
}

function exits_reset_token($reset_token){
    $rows = db_num_rows("SELECT * FROM `tbl_admin` WHERE `reset_token` = '{$reset_token}'");
    if($rows > 0)
        return true;
    return false;
}

function update_pass_by_token($data, $reset_token){
    db_update('tbl_admin', $data, "`reset_token` = '{$reset_token}'");
}