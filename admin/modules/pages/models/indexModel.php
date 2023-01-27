<?php

function add_page($data) {
    return db_insert('tbl_pages', $data);
}

function get_all_pages() {
    return db_fetch_array("SELECT * FROM `tbl_pages`");
}

function get_page_by_id($id) {
    return db_fetch_row("SELECT * FROM `tbl_pages` WHERE `page_id` = {$id}");
}

function update_page($data, $id){
    db_update('tbl_pages', $data, "`page_id` = {$id}");
}

function delete_page($id){
    db_delete('tbl_pages', "`page_id` = {$id}");
}