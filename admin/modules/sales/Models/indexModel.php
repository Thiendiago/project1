<?php

function get_list_customers() {
    return db_fetch_array("SELECT * FROM `tbl_customers` ORDER BY `customer_id` DESC");
}

function get_num_bills($customer_id) {
    return db_num_rows("SELECT * FROM `tbl_bills` WHERE `customer_id` = {$customer_id} AND `status` = '2'");
}

function delete_customers($arr_customer_id) {
    db_delete('tbl_customers', "`customer_id` IN($arr_customer_id)");
}

function get_list_bills() {
    return db_fetch_array("SELECT * FROM `tbl_bills` ORDER BY `bill_id` DESC");
}

function get_fullname_by_customer_id($customer_id) {
    $result = db_fetch_row("SELECT * FROM `tbl_customers` WHERE `customer_id` = {$customer_id}");
    return $result['fullname'];
}

function update_status($status, $arr_bill_id) {
    $data['status'] = $status;
    db_update('tbl_bills', $data, "`bill_id` IN ({$arr_bill_id})");
}

function delete_bills($arr_bill_id) {
    db_delete('tbl_bills', "`bill_id` IN ({$arr_bill_id})");
    db_delete('tbl_bill_details', "`bill_id` IN ({$arr_bill_id})");
}

function get_bill_detail_by_id($id) {
    return db_fetch_array("SELECT `tbl_products`.`product_name`, `tbl_products`.`product_avatar`, `tbl_bill_details`.`price`, `tbl_bill_details`.`qty`, `tbl_bill_details`.`sub_total`  FROM `tbl_bill_details` JOIN `tbl_products` ON `tbl_bill_details`.`product_id` = `tbl_products`.`product_id` WHERE `bill_id` = {$id}");
}

function get_bill_by_id($id) {
    return db_fetch_row("SELECT * FROM `tbl_bills` WHERE `bill_id` = {$id}");
}

function get_customer_by_id($id) {
    return db_fetch_row("SELECT * FROM `tbl_customers` WHERE `customer_id` = {$id}");
}
