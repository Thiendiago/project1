<?php

function construct() {
//    Dùng chung
    load_model('index');
    load('lib', 'validation');
    load('helper', 'convert');
    load('helper', 'get');
}

//PHẦN DANH MỤC SẢN PHẨM
function addCatAction() {
    global $error, $success;
    if (isset($_POST['btn_addCat'])) {
        #KIỂM TRA TÊN DANH MỤC
        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "<p class='text-warning'>Bạn chưa nhập tên danh mục!</p>";
        } else {
            $cat_name = $_POST['cat_name'];
        }
        #KIỂM TRA THỨ TỰ
        if (empty($_POST['rank'])) {
            $error['rank'] = "<p class='text-warning'>Bạn chưa nhập thứ tự!</p>";
        } else {
            $rank = $_POST['rank'];
        }

        if (empty($error)) {
            $data = array(
                'cat_name' => $cat_name,
                'rank' => $rank,
                'creator' => user_login(),
                'created_at' => time()
            );
            add_cat($data);
            $success['add_cat'] = "<p class='alert alert-success'><strong>Thêm mới thành công!</strong></p>";
        }
    }

    load_view('addCat');
}

function listCatAction() {
    global $error;
    //    Kiểm tra quyền
    if (is_editor() || is_admin()) {
        #Kiểm tra đã button và check            box
        if (isset($_POST['btn_apply']) && isset($_POST['item'])) {
            if ($_POST['actions'] == '0') {
                $data['status'] = '0';
//            Dùng implode để convert từ mảng đa chiều về mảng 1 chiều ngăn cách bởi dấu ,
                $list_items = implode(',', $_POST['item']);
                update_status_to_cat($data, $list_items);
            }
            if ($_POST['actions'] == '1') {
                $data['status'] = '1';
//            Dùng implode để convert từ mảng đa chiều về mảng 1 chiều ngăn cách bởi dấu ,
                $list_items = implode(',', $_POST['item']);
                update_status_to_cat($data, $list_items);
            }
            if ($_POST['actions'] == '2') {
//            Dùng implode để convert từ mảng đa chiều về mảng 1 chiều ngăn cách bởi dấu ,
                $list_items = implode(',', $_POST['item']);
                delete_cats($list_items);
            }
        }

        $list_cat = get_all_cat();
        $data['list_cat'] = $list_cat;
        load_view('listCat', $data);
    } else {
        $error['role'] = "<p class='alert-danger text-center'><strong>Bạn chưa được cấp quyền xử lý phần này!</strong></p>";
        load_view('listCat');
    }
}

function editCatAction() {
    $id = (int) $_GET['id'];

    global $error, $success;
    if (isset($_POST['btn_editCat'])) {
        #KIỂM TRA TÊN DANH MỤC
        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "<p class='text-warning'>Bạn chưa nhập tên danh mục!</p>";
        } else {
            $cat_name = $_POST['cat_name'];
        }
        #KIỂM TRA THỨ TỰ
        if (empty($_POST['rank'])) {
            $error['rank'] = "<p class='text-warning'>Bạn chưa nhập thứ tự!</p>";
        } else {
            $rank = $_POST['rank'];
        }

        if (empty($error)) {
            $data = array(
                'cat_name' => $cat_name,
                'rank' => $rank,
            );
            update_cat($data, $id);
            $success['update_cat'] = "<p class='alert alert-success'><strong>Cập nhật thành công!</strong></p>";
        }
    }

    $cat = get_cat($id);
    $data['cat'] = $cat;

    load_view('editCat', $data);
}

function deleteCatAction() {
    $id = (int) $_GET['id'];
    delete_cat($id);
    redirect('?mod=products&controller=index&action=listCat');
}

//PHẦN SẢN PHẨM

function addAction() {
    global $error, $success, $product_name, $code, $price, $qty, $desc, $content, $avatar, $cat_name, $status;
    if (isset($_POST['btn_add'])) {
        #KIỂM TRA TÊN SẢN PHẨM
        if (empty($_POST['product_name'])) {
            $error['product_name'] = "<p class='text-warning'>Bạn chưa nhập tên sản phẩm!</p>";
        } else {
            $product_name = $_POST['product_name'];
        }
        #KIỂM TRA MÃ SẢN PHẨM
        if (empty($_POST['code'])) {
            $error['code'] = "<p class='text-warning'>Bạn chưa nhập mã sản phẩm!</p>";
        } else {
            $code = $_POST['code'];
        }
        #KIỂM TRA GIÁ SẢN PHẨM
        if (empty($_POST['price'])) {
            $error['price'] = "<p class='text-warning'>Bạn chưa nhập giá sản phẩm!</p>";
        } else {
            $price = $_POST['price'];
        }
        #KIỂM TRA SỐ LƯỢNG SẢN PHẨM
        if (empty($_POST['qty'])) {
            $error['qty'] = "<p class='text-warning'>Bạn chưa nhập số lượng sản phẩm!</p>";
        } else {
            $qty = $_POST['qty'];
        }
        #MÔ TẢ SẢN PHẨM
        $desc = $_POST['desc'];
        #CHI TIẾT
        $content = $_POST['content'];
        #KIỂM TRA FILE UPLOAD
        if (empty($_FILES['file']['name'])) {
            $error['avatar'] = "<p class='text-warning'>Bạn chưa thêm hình ảnh!</p>";
        } else {
            $avatar = ($_FILES['file']['name']);
        }
        #KIỂM TRA DANH MỤC SẢN PHẨM
        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "<p class='text-warning'>Bạn chưa chọn danh mục sản phẩm!</p>";
        } else {
            $cat_id = $_POST['cat_name'];
        }
        #KIỂM TRA TRẠNG THÁI
        if (empty($_POST['status']) && $_POST['status'] != '0') {
            $error['status'] = "<p class='text-warning'>Bạn chưa chọn trạng thái!</p>";
        } else {
            $status = $_POST['status'];
        }
//        Nếu không lỗi
        if (empty($error)) {
            $data = array(
                'product_name' => $product_name,
                'code' => $code,
                'price' => $price,
                'qty' => $qty,
                'product_avatar' => $avatar,
                'product_desc' => $desc,
                'product_content' => $content,
                'status' => $status,
                'cat_id' => $cat_id,
                'creator' => user_login(),
                'created_at' => time(),
            );
            add_product($data);
            $success['add_product'] = "<p class='alert alert-success'><strong>Thêm sản phẩm thành công!</strong></p>";
        }
    }

    load_view('add');
}

function indexAction() {
    global $error;
    //    Kiểm tra quyền
    if (is_editor() || is_admin()) {
        load('helper', 'pagging');
        #Kiểm tra đã button và checkbox
        if (isset($_POST['btn_apply']) && isset($_POST['item'])) {
            if ($_POST['actions'] == '0') {
                $data['status'] = '0';
//            Dùng implode để convert từ mảng đa chiều về mảng 1 chiều ngăn cách bởi dấu ,
                $list_items = implode(',', $_POST['item']);
                update_status_to_product($data, $list_items);
            }
            if ($_POST['actions'] == '1') {
                $data['status'] = '1';
//            Dùng implode để convert từ mảng đa chiều về mảng 1 chiều ngăn cách bởi dấu ,
                $list_items = implode(',', $_POST['item']);
                update_status_to_product($data, $list_items);
            }
            if ($_POST['actions'] == '2') {
//            Dùng implode để convert từ mảng đa chiều về mảng 1 chiều ngăn cách bởi dấu ,
                $list_items = implode(',', $_POST['item']);
                delete_products($list_items);
            }
        }

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $page = (int) $page;
        $num_per_page = 15;
        $start = ($page - 1) * $num_per_page;


//    Kiểm tra đã nhập vào dl vào search chưa
        if (isset($_POST['btn_search']) && !empty($_POST['search'])) {
            $str_search = $_POST['search'];
//        Lấy danh sách bài viết theo search + phân trang
            $list_products = search($start, $num_per_page, $str_search);
            $total_rows = get_num_product_search($start, $num_per_page, $str_search);
            $num_page = ceil($total_rows / $num_per_page);
            $data = array(
                'num_page' => $num_page,
                'page' => $page,
                'list_products' => $list_products
            );
        } else {
//        Lấy tất cả sản phẩm theo phân trang
            $list_products = get_all_products_by_page($start, $num_per_page, "");
            $total_rows = get_num_products();
            $num_page = ceil($total_rows / $num_per_page);
            $data = array(
                'num_page' => $num_page,
                'page' => $page,
                'list_products' => $list_products
            );
        }

        load_view('index', $data);
    } else {
        $error['role'] = "<p class='alert-danger text-center'><strong>Bạn chưa được cấp quyền xử lý phần này!</strong></p>";
        load_view('index');
    }
}

function editAction() {
    $id = (int) $_GET['id'];

    global $error, $success, $product_name, $code, $price, $desc, $content, $avatar, $cat_name, $status;
    if (isset($_POST['btn_edit'])) {
        #KIỂM TRA TÊN SẢN PHẨM
        if (empty($_POST['product_name'])) {
            $error['product_name'] = "<p class='text-warning'>Bạn chưa nhập tên sản phẩm!</p>";
        } else {
            $product_name = $_POST['product_name'];
        }
        #KIỂM TRA MÃ SẢN PHẨM
        if (empty($_POST['code'])) {
            $error['code'] = "<p class='text-warning'>Bạn chưa nhập mã sản phẩm!</p>";
        } else {
            $code = $_POST['code'];
        }
        #KIỂM TRA GIÁ SẢN PHẨM
        if (empty($_POST['price'])) {
            $error['price'] = "<p class='text-warning'>Bạn chưa nhập giá sản phẩm!</p>";
        } else {
            $price = $_POST['price'];
        }
        #KIỂM TRA SỐ LƯỢNG SẢN PHẨM
        if (empty($_POST['qty'])) {
            $error['qty'] = "<p class='text-warning'>Bạn chưa nhập số lượng sản phẩm!</p>";
        } else {
            $qty = $_POST['qty'];
        }
        #MÔ TẢ SẢN PHẨM
        $desc = $_POST['desc'];
        #CHI TIẾT
        $content = $_POST['content'];
        #KIỂM TRA DANH MỤC SẢN PHẨM
        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "<p class='text-warning'>Bạn chưa chọn danh mục sản phẩm!</p>";
        } else {
            $cat_id = $_POST['cat_name'];
        }
        #KIỂM TRA TRẠNG THÁI
        if (empty($_POST['status']) && $_POST['status'] != '0') {
            $error['status'] = "<p class='text-warning'>Bạn chưa chọn trạng thái!</p>";
        } else {
            $status = $_POST['status'];
        }
//        Nếu không lỗi
        if (empty($error)) {
//            Kiểm tra file ảnh nếu trống thì không cập nhật ảnh, ngược lại cập nhật
            if (empty($_FILES['file']['name'])) {
                $data = array(
                    'product_name' => $product_name,
                    'code' => $code,
                    'price' => $price,
                    'qty' => $qty,
                    'product_desc' => $desc,
                    'product_content' => $content,
                    'status' => $status,
                    'cat_id' => $cat_id,
                );
            } else {
                $avatar = $_FILES['file']['name'];
                $data = array(
                    'product_name' => $product_name,
                    'code' => $code,
                    'price' => $price,
                    'qty' => $qty,
                    'product_avatar' => $avatar,
                    'product_desc' => $desc,
                    'product_content' => $content,
                    'status' => $status,
                    'cat_id' => $cat_id,
                );
            }
            update_product($data, $id);
            $success['update_product'] = "<p class='alert alert-success'><strong>Cập nhật sản phẩm thành công!</strong></p>";
        }
    }

    $products = get_products($id);
    $data['products'] = $products;

    load_view('edit', $data);
}

function deleteAction() {
    $id = (int) $_GET['id'];
    delete_product($id);
    redirect('?mod=products&controller=index&action=index');
}
