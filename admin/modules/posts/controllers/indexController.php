<?php

function construct() {
    load_model('index');
    load('lib', 'validation');
    load('helper', 'convert');
    load('helper', 'pagging');
}

function addAction() {
    global $error, $success, $title, $desc, $content;
    if (isset($_POST['btn_add'])) {
        #KIỂM TRA TIÊU ĐỀ
        if (empty($_POST['title'])) {
            $error['title'] = "<p class='text-warning'>Bạn chưa nhập tiêu đề!</p>";
        } else {
            $title = ($_POST['title']);
        }
        #KIỂM TRA MÔ TẢ NGẮN
        if (empty($_POST['desc'])) {
            $error['desc'] = "<p class='text-warning'>Bạn chưa nhập mô tả!</p>";
        } else {
            $desc = ($_POST['desc']);
        }
        #KIỂM TRA NỘI DUNG BÀI VIẾT
        if (empty($_POST['content'])) {
            $error['content'] = "<p class='text-warning'>Bạn chưa nhập nội dung bài viết!</p>";
        } else {
            $content = ($_POST['content']);
        }
        #KIỂM TRA FILE UPLOAD
        if (empty($_FILES['file']['name'])) {
            $error['avatar'] = "<p class='text-warning'>Bạn chưa thêm ảnh đại diện cho bài viết!</p>";
        } else {
            $avatar = $_FILES['file']['name'];
        }
//        Nếu không lỗi
        if (empty($error)) {
            $data = array(
                'post_title' => $title,
                'post_desc' => $desc,
                'post_content' => $content,
                'post_avatar' => $avatar,
                'creator' => user_login(),
                'created_at' => time(),
            );
            create_post($data);
            $success['create_post'] = "<p class='alert alert-success'><strong>Thêm bài viết thành công!</strong></p>";
        } else {
            if (isset($avatar)) {
                $dir = "public/uploads/images/";
                $link = $dir . $avatar;
                unlink($link);
            }
        }
    }

    load_view('add');
}

function processAction() {
    // show_array($_POST);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Bước 1: Tạo thư mục lưu file
        $error = array();
        $target_dir = "public/uploads/images/";
        $target_file = $target_dir . basename($_FILES['file']['name']);
        // Kiểm tra kiểu file hợp lệ
        $type_file = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array(strtolower($type_file), $type_fileAllow)) {
            $error['file'] = "Vui lòng chọn đúng định dạng ảnh!";
        }
        //Kiểm tra kích thước file
        $size_file = $_FILES['file']['size'];
        if ($size_file > 5242880) {
            $error['file'] = "File chọn không được quá 5MB!";
        }
        // Kiểm tra file đã tồn tại trê hệ thống
        if (file_exists($target_file)) {
            $error['file'] = "Tên file này đã tồn tại trên hệ thống!";
        }
        //
        if (empty($error)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $flag = true;
                echo json_encode(array('status' => 'ok', 'file_path' => $target_file));
            } else {
                echo json_encode(array('status' => 'error'));
            }
        } else {
            echo json_encode(array('status' => $error['file']));
        }
    }
}

function indexAction() {
    global $error;
//    Kiểm tra quyền
    if(is_editor() || is_admin()){
    #Kiểm tra đã button và checkbox
    if (isset($_POST['btn_apply']) && isset($_POST['item'])) {
        if ($_POST['actions'] == '0') {
            $data['status'] = '0';
//            Dùng implode để convert từ mảng đa chiều về mảng 1 chiều ngăn cách bởi dấu ,
            $list_items = implode(',', $_POST['item']);
            update_status($data, $list_items);
        }
        if ($_POST['actions'] == '1') {
            $data['status'] = '1';
//            Dùng implode để convert từ mảng đa chiều về mảng 1 chiều ngăn cách bởi dấu ,
            $list_items = implode(',', $_POST['item']);
            update_status($data, $list_items);
        }
        if ($_POST['actions'] == '2') {
//            Dùng implode để convert từ mảng đa chiều về mảng 1 chiều ngăn cách bởi dấu ,
            $list_items = implode(',', $_POST['item']);
            foreach($_POST['item'] as $value){
                unlink_post($value);
            }
            delete_posts($list_items);
        }
    }

    #Kiểm tra button_seach
    if (isset($_POST['btn_search']) && !empty($_POST['search'])) {
        $str_search = $_POST['search'];
//        Lấy danh sách bài viết theo search
        $all_posts = search($str_search);
        $data['all_posts'] = $all_posts;
    } else {
//        Lấy tất cả bài viết và phân trang 
        $total_rows = get_total_posts();
        $num_per_page = 15;
        $num_page = ceil($total_rows / $num_per_page);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page = (int) $page;
        $start = ($page - 1) * $num_per_page;

        $all_posts = get_all_posts($start, $num_per_page, "");
        $data = array(
            'num_page' => $num_page,
            'page' => $page,
            'all_posts' => $all_posts
        );
    }
    load_view('index', $data);
    }else{
        $error['role'] = "<p class='alert-danger text-center'><strong>Bạn chưa được cấp quyền xử lý phần này!</strong></p>";
        load_view('index');
    }
    
}

function editAction() {
    $id = (int) $_GET['id'];
    global $error, $success;
    if (isset($_POST['btn_edit'])) {
        #KIỂM TRA TIÊU ĐỀ
        if (empty($_POST['title'])) {
            $error['title'] = "<p class='text-warning'>Bạn chưa nhập tiêu đề!</p>";
        } else {
            $title = ($_POST['title']);
        }
        #KIỂM TRA MÔ TẢ NGẮN
        if (empty($_POST['desc'])) {
            $error['desc'] = "<p class='text-warning'>Bạn chưa nhập mô tả!</p>";
        } else {
            $desc = ($_POST['desc']);
        }
        #KIỂM TRA NỘI DUNG BÀI VIẾT
        if (empty($_POST['content'])) {
            $error['content'] = "<p class='text-warning'>Bạn chưa nhập nội dung bài viết!</p>";
        } else {
            $content = ($_POST['content']);
        }
        #KIỂM TRA FILE UPLOAD
        if (!empty($_FILES['file']['name'])) {
            $avatar = $_FILES['file']['name'];
        }

//        Nếu không lỗi
        if (empty($error)) {
            if (isset($avatar)) {
                $data = array(
                    'post_title' => $title,
                    'post_desc' => $desc,
                    'post_content' => $content,
                    'post_avatar' => $avatar,
                );
                unlink_post($id);
            } else {
                $data = array(
                    'post_title' => $title,
                    'post_desc' => $desc,
                    'post_content' => $content,
                );
            }
            update_post($data, $id);
            $success['update_post'] = "<p class='alert alert-success'><strong>Cập nhật bài viết thành công!</strong></p>";
        }
    }
    $post = get_post($id);
    $data['post'] = $post;
    load_view('edit', $data);
}

function deleteAction() {
    $id = (int) $_GET['id'];
    unlink_post($id);
    delete_post($id);

    redirect('?mod=posts&controller=index&action=index');
}
