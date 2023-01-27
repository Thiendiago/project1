<?php

function construct() {
//    Dùng chung
    load_model('index');
    load('helper', 'pagging');
}

function indexAction() {
    $id = (int) $_GET['id'];

    load_view('index', $data);
}

function catAction() {
    $cat_id = (int) $_GET['id'];
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page = (int) $page;
    $num_per_page = 8;
    $start = ($page - 1) * $num_per_page;
    
    if(isset($_POST['btn_sort']) && !empty($_POST['select'])){
        if($_POST['select'] == 1){
            $sort = "`product_name` ASC";
        }
        if($_POST['select'] == 2){
            $sort = "`product_name` DESC";
        }
        if($_POST['select'] == 3){
            $sort = "`price` DESC";
        }
        if($_POST['select'] == 4){
            $sort = "`price` ASC";
        }
        $list_products = get_products_by_sort($cat_id, $sort, $start, $num_per_page);
        $total_rows = get_num_products($cat_id);
        $num_page = ceil($total_rows / $num_per_page);
    }else{
        
        $list_products = get_products($cat_id, $start, $num_per_page);
        $total_rows = get_num_products($cat_id);
        $num_page = ceil($total_rows / $num_per_page);
    }
    
    $list_cat_product = get_list_cat_product_by_id($cat_id);
    
    if(isset($list_products)){
        $data['list_products'] = $list_products;
    }
    $data['list_cat_product'] = $list_cat_product;
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['cat_id'] = $cat_id;
    load_view('cat', $data);
}

function filterAction() {
    //    Khai báo biến toàn cục
    global $list_products;
    if (isset($_POST['btn_filter'])) {
        if (!empty($_POST['level_price'])) {
            $level_price = $_POST['level_price'];
        } else {
            $level_price = '';
        }
        if (!empty($_POST['company'])) {
            $company = $_POST['company'];
        } else {
            $company = '';
        }
        if (!empty($_POST['cat_id'])) {
            $cat_id = $_POST['cat_id'];
        } else {
            $cat_id = '';
        }
        $list_products = get_products_by_filter($level_price, $company, $cat_id );
    }
    load_view('filter');
}

function detailAction(){
    load('helper', 'func');
     $id = (int) $_GET['id'];
    $product = get_product($id);
    $cat_id  = $product['cat_id'];
    $same_cat = get_products_by_same_cat($cat_id);
//    show_array($same_cat);
    $data = array(
        'product' => $product,
        'same_cat' => $same_cat
    );
            
    load_view('detail', $data);
    
}

function searchAction(){
    if(!empty($_POST['s'])){
        $str_search = $_POST['s'];
        $list_products = get_products_by_search($str_search);
    }
    if(!empty($list_products)){
    $data = array(
        'list_products' => $list_products,
        'str_search' =>  $str_search
    );
    }else{
        $data = array();
    }
    load_view('search', $data);
}


