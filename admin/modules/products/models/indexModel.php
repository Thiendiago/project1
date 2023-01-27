<?php

function add_cat($data) {
    db_insert('tbl_product_cat', $data);
}

function get_all_cat() {
    return db_fetch_array("SELECT * FROM `tbl_product_cat`");
}

function get_num_product_cat() {
    return db_num_rows("SELECT * FROM `tbl_product_cat`");
}

function get_num_product_cat_by_status($num) {
    return db_num_rows("SELECT * FROM `tbl_product_cat` WHERE `status` = '{$num}'");
}

function get_cat($id) {
    return db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `cat_id` = {$id}");
}

function update_cat($data, $id) {
    db_update('tbl_product_cat', $data, "`cat_id` = {$id}");
}

function delete_cat($id) {
    db_delete('tbl_product_cat', "`cat_id` = {$id}");
}

function update_status_to_cat($data, $list_items) {
    db_update('tbl_product_cat', $data, "`cat_id` IN ($list_items)");
}

function delete_cats($list_items) {
    db_delete('tbl_product_cat', "`cat_id` IN ($list_items)");
}

function add_product($data) {
    db_insert('tbl_products', $data);
}

function get_product_cat_by_cat_id($cat_id) {
    $result = db_fetch_row("SELECT * FROM `tbl_products` JOIN `tbl_product_cat` ON `tbl_products`.`cat_id` = `tbl_product_cat`.`cat_id` WHERE `tbl_product_cat`.`cat_id` = $cat_id");
    return $result['cat_name'];
}

function get_num_products() {
    return db_num_rows("SELECT * FROM `tbl_products`");
}

function get_num_product_by_status($num) {
    return db_num_rows("SELECT * FROM `tbl_products` WHERE `status` = '{$num}'");
}

function get_products($id) {
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `product_id` = {$id}");
}

function unlink_product($id) {
    $result = db_fetch_row("SELECT * FROM `tbl_products` WHERE `product_id` = {$id}");
    $name = $result['product_avatar'];
    $dir = "public/uploads/images/";
    $link = $dir.$name;
    unlink($link);
}
function update_product($data, $id) {
     db_update('tbl_products', $data, "`product_id` = {$id}");
}

function update_status_to_product($data, $list_items) {
    db_update('tbl_products', $data, "`product_id` IN ($list_items)");
}

function delete_products($list_items) {
    db_delete('tbl_products', "`product_id` IN ($list_items)");
}

function delete_product($id) {
    db_delete('tbl_products', "`product_id` = {$id}");
}

//Search kết hợp phân trang luôn
function search($start, $num_per_page, $str_search) {
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_name` LIKE '%{$str_search}%' LIMIT {$start}, {$num_per_page}");
}
function get_num_product_search($start, $num_per_page, $str_search) {
    return db_num_rows("SELECT * FROM `tbl_products` WHERE `product_name` LIKE '%{$str_search}%'");
}

function get_all_products_by_page($start, $num_per_page, $where = "") {
    if (!empty($where)) {
        $where = "WHERE {$where}";
    }
    return db_fetch_array("SELECT * FROM `tbl_products` $where ORDER BY `product_id` DESC  LIMIT {$start}, {$num_per_page}");
}
