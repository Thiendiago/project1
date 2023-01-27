<?php

function get_list_cat_product(){
    return db_fetch_array("SELECT * FROM `tbl_product_cat` WHERE `status` = '1' ORDER BY `rank` ASC");
}

function get_selling_products(){
    return db_fetch_array("SELECT * FROM `tbl_products` ORDER BY `qty_sold` DESC LIMIT 10");
}
