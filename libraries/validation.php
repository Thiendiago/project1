<?php

function is_username($usernam) {
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (preg_match($partten, $usernam)) {
        return true;
    }
    return false;
}

function is_password($password) {
    $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (preg_match($partten, $password)) {
        return true;
    }
    return false;
}

function is_email($password) {
    $parttern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (preg_match($parttern, $password))
        return true;
}

function set_value($label_field) {
    global $$label_field;
    return $$label_field;
}


function form_error($name) {
    global $error;
    if (!empty($error["{$name}"])) {
        return $error["{$name}"];
    }
}

function form_success($name){
    global $success;
    if(!empty($success[$name])){
        return $success[$name];
    }
} 


function user_info($field) {
    global $list_users;
    if (isset($_SESSION['user_login'])) {
        foreach ($list_users as $user) {
            if ($_SESSION['user_login'] == $user['username']) {
                return $user[$field];
            }
        }
    }
    return false;
}

