<?php

function get_pagging($mod_name, $page, $num_page) {
    $html_pagging = "<ul id='list-paging' class='fl-right'>";
    $prev_page = $page - 1;
    if ($page > 1) {
        $html_pagging .= "<li><a  href='?mod={$mod_name}&controller=index&action=index&page={$prev_page}'>Trước</a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = '';
        if ($i == $page) {
            $active = 'active';
        }
        $html_pagging .= "<li><a class = '{$active}' href='?mod={$mod_name}&controller=index&action=index&page={$i}'>{$i}</a></li>";
    }
    $next_page = $page + 1;
    if ($page < $num_page) {
        $html_pagging .= "<li><a  href='?mod={$mod_name}&controller=index&action=index&page={$next_page}'>Sau</a></li>";
    }
    $html_pagging .= "</ul>";
    return $html_pagging;
}

