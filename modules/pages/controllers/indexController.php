<?php

function construct(){
    load('lib', 'validation');
    load('lib', 'email');
    load_model('index');
}

function contactAction(){
    global $error, $success;
    if(isset($_POST['btn_send'])){
        $error = array();
        $success = array();
        #KIỂM TRA HỌ TÊN
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "<p class='text-warning'>Bạn chưa nhập họ và tên!</p>";
        } else {
            $fullname = ($_POST['fullname']);
        }
        #KIỂM TRA EMAIL
        if (empty($_POST['email'])) {
            $error['email'] = "<p class='text-warning'>Bạn chưa nhập email!</p>";
        } else {
            $email = ($_POST['email']);
        }
        #KIỂM TRA TITLE
        if (empty($_POST['title'])) {
            $error['title'] = "<p class='text-warning'>Bạn chưa nhập tiêu đề!</p>";
        } else {
            $title = ($_POST['title']);
        }
        #KIỂM TRA EMAIL
        if (empty($_POST['content'])) {
            $error['content'] = "<p class='text-warning'>Bạn chưa nhập nội dung!</p>";
        } else {
            $content = ($_POST['content']);
        }
        #KHÔNG LỖI
        if(empty($error)){
            $data = array(
                'fullname' => $fullname,
                'email' => $email,
                'title' => $title,
                'content' => $content,
                'created_at' => time()
            );
            add_contact($data);
            $success['add_contact'] = "<p class='alert-success text-center'>Yêu cầu thành công! Hệ thống sẽ liện hệ với bạn sớm nhất.</p>";
        }
    }
    load_view('contact');
}