<?php

function get_product_by_id($id) {
    $result = db_fetch_row("SELECT * FROM `tbl_product` WHERE `product_id` = {$id}");
    return $result;
}

function add_cart($id) {
    $product = get_product_by_id($id);
    $qty = 1;
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }
    $_SESSION['cart']['buy'][$id] = array(
        'id' => $id,
        'code' => $product['code'],
        'product_thumb' => $product['product_thumb'],
        'product_title' => $product['product_title'],
        'price' => $product['price'],
        'qty' => $qty,
        'sub_total' => $product['price'] * $qty,
    );
    update_info_cart();
}

function update_info_cart() {
    $num_order = 0;
    $total = 0;
    foreach ($_SESSION['cart']['buy'] as $value) {
        $num_order += $value['qty'];
        $total += $value['sub_total'];
    }
    $_SESSION['cart']['info'] = array(
        'num_order' => $num_order,
        'total' => $total,
    );
//        show_array($_SESSION['cart']);
}

function get_total_cart() {
    if (!empty($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}

function updatecart($arr_qty) {

    foreach ($arr_qty as $key => $value) {
        $_SESSION['cart']['buy'][$key]['qty'] = $value;
        $_SESSION['cart']['buy'][$key]['sub_total'] = $value * $_SESSION['cart']['buy'][$key]['price'];
    }
    update_info_cart();
}

function delete_cart($id = ''){
    if(!empty($id)){
        unset($_SESSION['cart']['buy'][$id]);
    }
    else{
        unset($_SESSION['cart']['buy']);
    }
    update_info_cart();
}