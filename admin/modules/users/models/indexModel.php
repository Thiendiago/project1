<?php
function get_info_account($username) {
    return db_fetch_row("SELECT * FROM `tbl_admin` WHERE `username` = '{$username}'");
}

function update_info($data, $username){
    return db_update('tbl_admin', $data, "`username` = '{$username}'");
}

function check_pass($username, $password) {
    $rows = db_num_rows("SELECT * FROM `tbl_admin` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    if ($rows > 0)
        return $rows;
    return false;
}

function update_pass($data, $username){
    db_update('tbl_admin', $data, "`username` = '{$username}'");
}

function create_admin($data){
    db_insert('tbl_admin', $data);
}

function check_username($username){
    $row = db_num_rows("SELECT * FROM `tbl_admin` WHERE `username` = '{$username}'");
    if($row > 0)
        return $row;
    return false;
}

function check_login($username, $password) {
    $rows = db_num_rows("SELECT * FROM `tbl_admin` WHERE `username` = '{$username}' AND `password` = '{$password}'");
    if ($rows > 0)
        return $rows;
    return false;
}
