<?php

function create_post($data) {
    db_insert('tbl_posts', $data);
}

//function get_all_posts() {
//    return db_fetch_array("SELECT * FROM `tbl_posts`");
//}
//Hàm lấy tất cả bài viết kết hợp phân trang
function get_all_posts($start, $num_per_page, $where = "") {
    if (!empty($where)) {
        $where = "WHERE {$where}";
    }
    return db_fetch_array("SELECT * FROM `tbl_posts` $where ORDER BY `post_id` DESC LIMIT {$start}, {$num_per_page}");
}

function get_total_posts() {
    return db_num_rows("SELECT * FROM `tbl_posts`");
}

function get_post($id) {
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_id` = {$id}");
}

function unlink_post($id) {
    $result = db_fetch_row("SELECT * FROM `tbl_posts` WHERE `post_id` = {$id}");
    $name = $result['post_avatar'];
    $dir = "public/uploads/images/";
    $link = $dir . $name;
    unlink($link);
}

function update_post($data, $id) {
    db_update('tbl_posts', $data, "`post_id` = {$id}");
}

function update_status($data, $list_items) {
    db_update('tbl_posts', $data, "`post_id` IN ($list_items)");
}

function delete_post($id) {
    db_delete('tbl_posts', "`post_id` = {$id}");
}

function delete_posts($list_items) {
    db_delete('tbl_posts', "`post_id` IN ($list_items)");
}

function get_num_by_status($num) {
    return db_num_rows("SELECT * FROM `tbl_posts` WHERE `status` = '{$num}'");
}

function search($str_search) {
    return db_fetch_array("SELECT * FROM `tbl_posts` WHERE `post_title` LIKE '%{$str_search}%'");
}
