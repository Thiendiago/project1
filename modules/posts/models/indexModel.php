<?php


function get_posts($start, $num_per_page){
    return db_fetch_array("SELECT * FROM `tbl_posts` WHERE `status` = '1' ORDER BY `post_id` DESC LIMIT {$start}, {$num_per_page}");
}

function get_post($id){
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_id` = {$id}");
}
function get_num_posts(){
    return db_num_rows("SELECT * FROM `tbl_posts` WHERE `status` = '1'");
}