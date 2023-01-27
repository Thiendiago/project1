<?php

function construct() {
    load_model('index');
    load('helper', 'convert');
}

function customerAction() {
    if (isset($_POST['btn_apply']) && ($_POST['actions']) == '0') {
        $arr_customer_id = implode(',', $_POST['item']);
        delete_customers($arr_customer_id);
    }

    $list_customers = get_list_customers();
    $data = array(
        'list_customers' => $list_customers
    );

    load_view('customer', $data);
}

function billAction() {
    if (isset($_POST['btn_apply']) && !empty($_POST['actions'])  ) {
        $arr_bill_id = implode(',', $_POST['item']);
        if ($_POST['actions'] == '0') {
            update_status('0', $arr_bill_id);
        }
        if ($_POST['actions'] == '1') {
            update_status('1', $arr_bill_id);
        }
        if ($_POST['actions'] == '2') {
            update_status('2', $arr_bill_id);
        }
        if ($_POST['actions'] == '3') {
            delete_bills($arr_bill_id);
        }
    }

    $list_bills = get_list_bills();
    $data = array(
        'list_bills' => $list_bills
    );
    load_view('bill', $data);
}

function detailAction() {
    load('helper', 'get');
    load('lib', 'validation');
    $id = (int) $_GET['id'];
    global $success;
    if(isset($_POST['btn_update_bill']) && (!empty($_POST['status'] || $_POST['status'] == '0'))){
        update_status($_POST['status'], $id);
        $success['update_status'] = "<p class='text-center alert-success'><strong>Cập nhật thành công!</strong></p>";
     }
    
    $bill_detail = get_bill_detail_by_id($id);
    $bill = get_bill_by_id($id);
    $data = array(
        'bill_detail' => $bill_detail,
        'bill' => $bill
    );
    load_view('detail', $data);
}
