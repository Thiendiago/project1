<?php

function convert_status($num){
    $arr = array(
        '0' => "<span class='alert-danger'>Ẩn</span>",
        '1' => "<span class='alert-success'>Hoạt động</span>"
    );
    return $arr[$num];
}

function status_bill($num){
    $arr = array(
        '0' => "<span class='alert-danger'>Chờ duyệt</span>",
        '1' => "<span class='alert-warning'>Đang vận chuyển</span>",
        '2' => "<span class='alert-success'>Hoàn thành</span>"
    );
    return $arr[$num];
}