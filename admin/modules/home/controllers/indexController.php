<?php

function construct() {
//    Dùng chung
    load_model('index');
}

function indexAction() {
//    $all_cat_products = get_all_cat_products();
//    $all_products = get_all_products();
//    $data = array(
//        'all_cat_products' => $all_cat_products,
//        'all_products' => $all_products
//    );
    load_view('index');
}
