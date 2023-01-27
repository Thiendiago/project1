<?php

function construct(){
    load_model('index');
}
function indexAction(){
    load('helper', 'pagging');
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page = (int) $page;
    $num_per_page = 8;
    $start = ($page - 1) * $num_per_page;
    $list_posts = get_posts($start, $num_per_page);
    $total_rows = get_num_posts();
    $num_page = ceil($total_rows / $num_per_page);
    
    $data = array(
        'page' => $page,
        'num_page' => $num_page,
        'list_posts' => $list_posts
    );
    
    load_view('index', $data);
}

function detailAction(){
    $id = (int) $_GET['id'];
    $post = get_post($id);
//    show_array($post);
    $data['post'] = $post;
    load_view('detail', $data);
}