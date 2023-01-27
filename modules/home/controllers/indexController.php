<?php

function construct() {
//    Dùng chung
    load_model('index');
}

function indexAction() {
    $list_product_cat = get_list_product_cat();
    $highlight_products = get_highlight_products();
    $data = array(
        'list_product_cat' => $list_product_cat,
        'highlight_products' => $highlight_products
    );
    load_view('index', $data);
}
