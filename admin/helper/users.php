<?php

function is_login() {
    if (isset($_SESSION['is_login'])) {
        return $_SESSION['is_login'];
    }
    return false;
}

function user_login() {
    if (isset($_SESSION['user_login'])) {
        return $_SESSION['user_login'];
    }
    return false;
}

function convert_role($num_of_role) {
    $arr = array(
        1 => 'Quản lý',
        2 => 'Biên tập viên',
        3 => 'Cộng tác viên',
    );
    return $arr[$num_of_role];
}

function is_admin(){
    $username = $_SESSION['user_login'];
    $rows = db_num_rows("SELECT * FROM `tbl_admin` WHERE `username` = '{$username}' AND `role` = 1");
    if($rows > 0)
        return true;
    return false;
}

function is_editor(){
    $username = $_SESSION['user_login'];
    $rows = db_num_rows("SELECT * FROM `tbl_admin` WHERE `username` = '{$username}' AND `role` = 2");
    if($rows > 0)
        return true;
    return false;
}