<?php

function construct() {
    load_model('index');
}

function addAction() {
    $id = (int) $_GET['id'];
    $product = get_product_by_id($id);
    add_cart($id, $product);
    redirect('?mod=cart');
}

function buy_nowAction() {
    $id = (int) $_GET['id'];
    $product = get_product_by_id($id);
    add_cart($id, $product);
    redirect('?mod=cart&action=checkout');
}

function indexAction() {
//    show_array($_SESSION);
    load_view('index');
}

//function updateAction() {
//    if (isset($_POST['btn_update_cart'])) {
//        updatecart($_POST['qty']);
//    }
//    redirect('?mod=cart');
//}

function deleteAction() {
    $id = (int) $_GET['id'];
    delete_cart($id);
    redirect('?mod=cart');
}

function delete_allAction() {
    delete_cart();
    redirect('?mod=cart');
}

function processAction() {
    $id = $_POST['id'];
    $price = $_SESSION['cart']['buy'][$id]['price'];
    $qty = $_POST['qty'];
    $sub_total = $price * $qty;

    $_SESSION['cart']['buy'][$id]['qty'] = $qty;
    $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;
    update_info_cart();

    $result = array(
        'price' => currency_format($price),
        'qty' => $qty,
        'sub_total' => currency_format($sub_total),
        'num_order' => $_SESSION['cart']['info']['num_order'],
        'total' => currency_format($_SESSION['cart']['info']['total']),
    );

    echo json_encode($result);
}

function checkoutAction() {
    load('lib', 'validation');
    global $error, $success, $fullname, $email, $address, $phone, $note;
    if (isset($_POST['btn_checkout'])) {
        $error = array();
        #Kiểm tra họ tên
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "<p class='text-warning'>Không được để trống trường này!</p>";
        } else {
            $fullname = htmlentities($_POST['fullname']);
        }
        #Email
        $email = htmlentities($_POST['email']);
        #Kiểm tra địa chỉ
        if (empty($_POST['address'])) {
            $error['address'] = "<p class='text-warning'>Không được để trống trường này!</p>";
        } else {
            $address = htmlentities($_POST['address']);
        }
        #Kiểm tra sdt
        if (empty($_POST['phone'])) {
            $error['phone'] = "<p class='text-warning'>Không được để trống trường này!</p>";
        } else {
            $phone = htmlentities($_POST['phone']);
        }
        #Ghi chú
        $note = htmlentities($_POST['note']);

//    Kết luận
        if (empty($error)) {
            if (!exits_phone($phone)) {
                //Thêm khách hàng
                $data = array(
                    'fullname' => $fullname,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'note' => $note,
                    'created_at' => time(),
                );
                add_customer($data);
                //Thêm hóa đơn
                $customer_id = get_customer_id($phone);
                $time = time();
                $data = array(
                    'num_order' => $_SESSION['cart']['info']['num_order'],
                    'total' => $_SESSION['cart']['info']['total'],
                    'customer_id' => $customer_id,
                    'created_at' => $time,
                );
                add_bill($data);
                //Cập nhật số lượng và tổng tiền đã bán cho tbl_products và thêm chi tiết hóa đơn
                $bill_id = get_bill_id($time);
                foreach ($_SESSION['cart']['buy'] as $key => $value) {
                    $data = array(
                        'qty_sold' => "`qty_sold` + {$value['qty']}",
                        'total_sold' => "`total_sold` + {$value['sub_total']}"
                    );
                    update_sold($data, $key);
                    $data = array(
                    'product_id' => $key,
                    'bill_id' => $bill_id,
                    'price' => $value['price'],
                    'qty' => $value['qty'],
                    'sub_total' => $value['sub_total'],
                    );
                    add_bill_detail($data);
                    $success['checkout'] = "<p class='text-center alert-success'><strong>Quý khách đã đặt hàng thành công! Nhân viên sẽ liên hệ sớm nhất.</strong></p>";
                }
            } else {
                //Cập nhật khách hàng
                $data = array(
                    'fullname' => $fullname,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'note' => $note,
                );
                update_customer($data, $phone);
                //Thêm hóa đơn
                $customer_id = get_customer_id($phone);
                $time = time();
                $data = array(
                    'num_order' => $_SESSION['cart']['info']['num_order'],
                    'total' => $_SESSION['cart']['info']['total'],
                    'customer_id' => $customer_id,
                    'created_at' => $time,
                );
                add_bill($data);
                //Thêm chi tiết hóa đơn
                $bill_id = get_bill_id($time);
                foreach ($_SESSION['cart']['buy'] as $key => $value) {
                    $data = array(
                        'qty_sold' => "`qty_sold` + {$value['qty']}",
                        'total_sold' => "`total_sold` + {$value['sub_total']}"
                    );
//                    show_array($data);
                    update_sold($data, $key);
                    $data = array(
                    'product_id' => $key,
                    'bill_id' => $bill_id,
                    'price' => $value['price'],
                    'qty' => $value['qty'],
                    'sub_total' => $value['sub_total'],
                    );
                    add_bill_detail($data);
                    $success['checkout'] = "<p class='text-center alert-success'><strong>Quý khách đã đặt hàng thành công! Nhân viên sẽ liên hệ sớm nhất.</strong></p>";
                }
                
            }
        }
//        show_array($_SESSION);
    }
    load_view('checkout');
}
