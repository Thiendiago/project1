<?php

function construct() {
//    Dùng chung
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');
}

function indexAction() {
    
}

function updateAction() {
    global $error;
    if (isset($_POST['btn_update_info_account'])) {
        $error = array();
        # KIỂM TRA DISPLAY_NAME
        if (empty($_POST['display_name'])) {
            $error['display_name'] = 'Tên hiển thị trống';
        } else {
            $display_name = $_POST['display_name'];
        }
        # KIỂM TRA EMAIL
        if (empty($_POST['email'])) {
            $error['email'] = 'Email trống';
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = 'Email không hợp lệ';
            } else {
                $email = $_POST['email'];
            }
        }
        # KIỂM TRA PHONE_NUMBER
        if (empty($_POST['tel'])) {
            $error['tel'] = 'Số điện thoại trống';
        } else {
            $tel = $_POST['tel'];
        }
        # KIỂM TRA ADDRESS
        if (empty($_POST['address'])) {
            $error['address'] = 'Địa chỉ trống';
        } else {
            $address = $_POST['address'];
        }

        if (empty($error)) {
            $data = array(
                'display_name' => $display_name,
                'email' => $email,
                'tel' => $tel,
                'address' => $address,
            );
            update_info($data, $_SESSION['user_login']);
        };
    }
//    LẤY THÔNG TIN ACCOUNT
    if (is_login()) {
        $info_account = get_info_account($_SESSION['user_login']);
    }
    $data['info_account'] = $info_account;
    load_view('update', $data);
}

function change_passAction() {
    global $error, $success;
    if (isset($_POST['btn_change_pass'])) {
        $error = array();
        $success = array();
        # KIỂM TRA MẬT KHẨU CŨ
        if (empty($_POST['pass_old'])) {
            $error['pass_old'] = 'Bạn chưa nhập mật khẩu cũ';
        } else {
            if (!(strlen($_POST['pass_old']) >= 6 && strlen($_POST['pass_old']) <= 32)) {
                $error['pass_old'] = 'Password từ 6 - 32 ký tự';
            } else {
                if (!is_password($_POST['pass_old'])) {
                    $error['pass_old'] = 'Viết hoa ký tự đầu tiên';
                } else {
                    $pass_old = md5($_POST['pass_old']);
                    if (!check_pass($_SESSION['user_login'], $pass_old)) {
                        $error['pass_old'] = 'Mật khẩu cũ không đúng';
                    }
                }
            }
        }
        # KIỂM TRA MẬT KHẨU MỚI
        if (empty($_POST['pass_new'])) {
            $error['pass_new'] = 'Bạn chưa nhập mật khẩu mới';
        } else {
            if (!(strlen($_POST['pass_new']) >= 6 && strlen($_POST['pass_new']) <= 32)) {
                $error['pass_new'] = 'Password từ 6 - 32 ký tự';
            } else {
                if (!is_password($_POST['pass_new'])) {
                    $error['pass_new'] = 'Viết hoa ký tự đầu tiên';
                } else {
                    $pass_new = md5($_POST['pass_new']);
                }
            }
        }
        # KIỂM TRA NHẬP LẠI MẬT KHẨU
        if (empty($_POST['confirm_pass'])) {
            $error['confirm_pass'] = 'Bạn chưa xác nhận lại mật khẩu';
        } else {
            if (!(strlen($_POST['confirm_pass']) >= 6 && strlen($_POST['confirm_pass']) <= 32)) {
                $error['confirm_pass'] = 'Password từ 6 - 32 ký tự';
            } else {
                if (!is_password($_POST['confirm_pass'])) {
                    $error['confirm_pass'] = 'Viết hoa ký tự đầu tiên';
                } else {
                    if ($_POST['pass_new'] === $_POST['confirm_pass']) {
                        $password = md5($_POST['confirm_pass']);
                        $data['password'] = $password;
                        update_pass($data, $_SESSION['user_login']);
                        $success['update_pass'] = "Cập nhật mật khẩu mời thành công!";
                    } else {
                        $error['confirm_pass'] = "Mật khẩu không khớp nhau";
                    }
                }
            }
        }
    }
    load_view('change_pass');
}

function logoutAction() {
    show_array($_SESSION);
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect('?mod=users&action=login');
}

function addAction() {
    if(is_admin()){
    global $error, $success, $display_name, $email, $username, $tel, $address, $role;
    if (isset($_POST['btn_add'])) {
        $error = array();
        # KIỂM TRA TÊN HIỂN THỊ
        if (empty($_POST['display_name'])) {
            $error['display_name'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            $display_name = $_POST['display_name'];
        }
        # KIỂM TRA USERNAME
        if (empty($_POST['username'])) {
            $error['username'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            if (!(strlen($_POST['username']) >= 6 && strlen($_POST['username']) <= 32)) {
                $error['username'] = "<p class='text-warning'>Trường này từ 6 - 32 ký tự</p>";
            } else {
                if (!is_username($_POST['username'])) {
                    $error['username'] = "<p class='text-warning'>Trường này không bao gồm ký tự đặc biệt</p>";
                } else {
                    $username = $_POST['username'];
                }
            }
        }
        # KIỂM TRA EMAIL
        if (empty($_POST['email'])) {
            $error['email'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "<p class='text-warning'>Email không hợp lệ</p>";
            } else {
                $email = $_POST['email'];
            }
        }
        # KIỂM TRA MẬT KHẨU
        if (empty($_POST['password'])) {
            $error['password'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "<p class='text-warning'>Trường này từ 6 - 32 ký tự</p>";
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = "<p class='text-warning'>Viết hoa ký tự đầu tiên</p>";
                } else {
                    $password = md5($_POST['password']);
                }
            }
        }
        # KIỂM TRA NHẬP LẠI MẬT KHẨU
        if (empty($_POST['confirm_pass'])) {
            $error['confirm_pass'] = "<p class='text-warning'>Bạn chưa xác nhận lại mật khẩu</p>";
        } else {
            if (!($_POST['confirm_pass'] === $_POST['password'])) {
                $error['password'] = "<p class='text-warning'>Mật khẩu không khớp nhau</p>";
            }
        }
        # KIỂM TRA VAI TRÒ
        if (empty($_POST['role'])) {
            $error['role'] = "<p class='text-warning'>Bạn chưa chọn vai trò</p>";
        } else {
            $role = $_POST['role'];
        }
        #KIỂM TRA SỐ ĐIỆN THOẠI
        $tel = $_POST['tel'];
        #KIỂM TRA ĐỊA CHỈ
        $address = $_POST['address'];
        
        #KẾT LUẬN
        if (empty($error)) {
            if (!check_username($username)) {
                $data = array(
                    'display_name' => $display_name,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'tel' => $tel,
                    'address' => $address,
                    'role' => $role,
                    'created_at' => time(),
                );
                create_admin($data);
                $success['add_account'] = "<p class='alert alert-success'><strong>Thêm tài khoản thành công!</strong></p>";
            } else {
                $error['account'] = "<p class=' alert alert-danger'><strong class='text-center'>Tài khoản đã tồn tại trên hệ thống!</strong></p>";
            }
        }
    }

    load_view('add');
    }    else{
        redirect('?mod=users&action=role');
    }
}
function roleAction(){
    load_view('role');
}