<?php


function get_media_by_page(){
    $data_1 = db_fetch_array("SELECT * FROM `tbl_products`");
    $data_2 = db_fetch_array("SELECT * FROM `tbl_posts`");
    $data = array($data_1,$data_2);
    return $data;
}