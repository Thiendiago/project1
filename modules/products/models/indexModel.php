<?php

function get_list_cat_product_by_id($cat_id) {
    return db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `cat_id` = {$cat_id} AND `status` = '1'");
}

function get_products($cat_id, $start, $num_per_page) {
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = {$cat_id} AND `status` = '1' ORDER BY `product_id` DESC LIMIT {$start}, {$num_per_page}");
}

function get_products_by_sort($cat_id, $sort, $start, $num_per_page){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = {$cat_id} AND `status` = '1' ORDER BY {$sort} LIMIT {$start}, {$num_per_page}");
}
function get_num_products($cat_id){
    return db_num_rows("SELECT * FROM `tbl_products` WHERE `cat_id` = {$cat_id} AND `status` = '1'");
}

function get_products_by_filter($level_price, $company, $cat_id) {
    if (empty($level_price) && empty($company) && empty($cat_id)) {
        return array();
    } else {
        if (!empty($level_price)) {
            $level_price = $level_price;
        } else {
            $level_price = "`price` = `price`";
        }

        if (!empty($company)) {
            $company = $company;
        } else {
            $company = '';
        }

        if (!empty($cat_id)) {
            $cat_id = $cat_id;
        } else {
            $cat_id = "`cat_id`";
        }
        if (!empty($level_price) && !empty($company) && !empty($cat_id)) {
            $where = '';
        } else {
            $where = 'WHERE';
        }
        return db_fetch_array("SELECT * FROM `tbl_products` WHERE {$level_price} AND `product_name` LIKE '%{$company}%' AND `cat_id` = {$cat_id} AND `status` ='1' ORDER BY `price` ASC");
    }
}

function get_product($id) {
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `product_id` = {$id}");
}

function get_products_by_same_cat($cat_id){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = {$cat_id} AND `status` = '1' ORDER BY RAND() LIMIT 12");
}

function get_products_by_search($str_search){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_name` LIKE '%{$str_search}%' AND `status` = '1'");
}
