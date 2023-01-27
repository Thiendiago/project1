<?php

function get_list_product_cat(){
    return db_fetch_array("SELECT * FROM `tbl_product_cat` WHERE `status` = '1' ORDER BY `rank` ASC");
}

function get_list_products_by_cat_id($cat_id){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `status` ='1' AND `cat_id` = {$cat_id} ORDER BY `product_id` DESC LIMIT 4");
}

function get_highlight_products(){
    return db_fetch_array("SELECT * FROM `tbl_products` ORDER BY `total_sold` DESC LIMIT 10");
}