<?php

function construct() {
//    Dùng chung
    load_model('index');
    load('lib', 'validation');
}

function indexAction() {
    $all_pages = get_all_pages();
    $data['all_pages'] = $all_pages;
    load_view('index', $data);
}

function addAction() {
    global $error, $success;
    if (isset($_POST['btn_add'])) {
        #KIỂM TRA TÊN TRANG
        if (empty($_POST['page_name'])) {
            $error['page_name'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            $page_name = htmlentities($_POST['page_name']);
        }
        #KIỂM TRA NỘI DUNG TRANG
        if (empty($_POST['page_content'])) {
            $error['page_content'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            $page_content = htmlentities($_POST['page_content']);
        }

        if (empty($error)) {
            $data = array(
                'page_name' => $page_name,
                'page_content' => $page_content,
                'created_at' => time()
            );
            add_page($data);
            $success['add_page'] = "<p class='alert alert-success'><strong>Thêm trang thành công!</strong></p>";
        } else {
            $error['add_page'] = "<p class='alert alert-danger'>Thêm trang thất bại!</p>";
        }
    }
    load_view('add');
}

function editAction() {
    $id = (int) $_GET['id'];

    global $error, $success;
    if (isset($_POST['btn_edit'])) {
        #KIỂM TRA TÊN TRANG
        if (empty($_POST['page_name'])) {
            $error['page_name'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            $page_name = htmlentities($_POST['page_name']);
        }
        #KIỂM TRA NỘI DUNG TRANG
        if (empty($_POST['page_content'])) {
            $error['page_content'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            $page_content = htmlentities($_POST['page_content']);
        }

        if (empty($error)) {
            $data = array(
                'page_name' => $page_name,
                'page_content' => $page_content,
            );
            update_page($data, $id);
            $success['update_page'] = "<p class='alert alert-success'><strong>Cập nhật trang thành công!</strong></p>";
        } else {
            $error['update_page'] = "<p class='alert alert-danger'>Cập nhật trang thất bại!</p>";
        }
    }

    $page = get_page_by_id($id);
    $data['page'] = $page;

    load_view('edit', $data);
}

function deleteAction() {
    $id = (int) $_GET['id'];
    delete_page($id);
    redirect('?mod=pages&controller=index&act   ion=index');
}

function detailAction() {
    $id = $_GET['id'];
    $list_page = get_page_by_id($id);
    $data['list_page'] = $list_page;
    load_view('index', $data);
}
