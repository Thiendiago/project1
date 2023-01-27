<?php

function get_product_by_id($id) {
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `product_id` = {$id}");
}

function exits_phone($phone){
    $row = db_num_rows("SELECT * FROM `tbl_customers` WHERE `phone` = {$phone}");
    if($row > 0)
        return true;
    return false;
}

function add_customer($data){
    db_insert("tbl_customers", $data);
}

function get_customer_id($phone){
    $result = db_fetch_row("SELECT * FROM `tbl_customers` WHERE `phone` = {$phone}");
    return $result['customer_id'];
}

function add_bill($data){
    db_insert("tbl_bills", $data);
}

function get_bill_id($time){
    $result = db_fetch_row("SELECT * FROM `tbl_bills` WHERE `created_at` = {$time}");
    return $result['bill_id'];
}

function add_bill_detail($data){
    db_insert("tbl_bill_details", $data);
}

function update_customer($data, $phone){
    db_update('tbl_customers', $data, "`phone` = {$phone}");
}

function update_sold($data, $key){
    global $conn;
    $sql = "UPDATE `tbl_products` SET `qty_sold` = {$data['qty_sold']}, `total_sold` = {$data['total_sold']} WHERE `product_id` = {$key}";
    if(mysqli_query($conn, $sql))
        return true;
    return false;
}