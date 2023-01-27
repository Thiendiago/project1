<?php

function construct() {
    
}

function showAction() {
    load_view('show');
}

function updateAction() {
    if (isset($_POST['btn_update'])) {
        updatecart($_POST['qty']);
    }
    redirect('gio-hang.html');
}

function deleteAction() {
    $id = (int) $_GET['id'];
    delete_cart($id);
    redirect('gio-hang.html');
}

function delete_allAction() {
    delete_cart();
    redirect('gio-hang.html');
}

function processAction(){
$id = $_POST['id'];
$price = $_SESSION['cart']['buy'][$id]['price'];
$qty = $_POST['qty'];
$sub_total = $price * $qty;

$_SESSION['cart']['buy'][$id]['qty'] = $qty;
$_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;
update_info_cart();

$result = array(
    'price' => currency_format($price),
    'sub_total' => currency_format($sub_total),
    'num_order' => $_SESSION['cart']['info']['num_order'],
    'total' => currency_format($_SESSION['cart']['info']['total']),
);

echo json_encode($result);
}