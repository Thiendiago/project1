<?php

function get_pagging($mod, $controller, $action, $page, $num_page, $id='') {
    if(!empty($id)){
        $id = "&id={$id}";
    }else{
        $id ="";
    }
    $html_pagging = "<ul id='list-paging' class='list-item clearfix'>";
    $prev_page = $page - 1;
    if ($page > 1) {
        $html_pagging .= "<li><a  href='?mod={$mod}&controller={$controller}&action={$action}{$id}&page={$prev_page}'>Trước</a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = '';
        if ($i == $page) {
            $active = 'active';
        }
        $html_pagging .= "<li><a class = '{$active}' href='?mod={$mod}&controller={$controller}&action={$action}{$id}&page={$i}'>{$i}</a></li>";
    }
    $next_page = $page + 1;
    if ($page < $num_page) {
        $html_pagging .= "<li><a  href='?mod={$mod}&controller={$controller}&action={$action}{$id}&page={$next_page}'>Sau</a></li>";
    }
    $html_pagging .= "</ul>";
    return $html_pagging;
}
