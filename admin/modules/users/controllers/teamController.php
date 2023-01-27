<?php

function construct() {
//    Dùng chung
    load_model('index');
    load_model('team');
    load('lib', 'validation');
    load('lib', 'email');
}

function indexAction() {
    $all_admin = get_all_admin();
    $data['all_admin'] = $all_admin;
    load_view('team_index', $data);
}

function updateAction() {
    global $error;
    //    Kiểm tra quyền
    if (is_admin()) {
        $id = (int) $_GET['id'];
        global $error, $success;
        if (isset($_POST['btn_update'])) {
            $error = array();
            # KIỂM TRA TÊN HIỂN THỊ
            if (empty($_POST['display_name'])) {
                $error['display_name'] = "<p class='text-warning'>Không được để trống trường này</p>";
            } else {
                $display_name = $_POST['display_name'];
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
                $data = array(
                    'display_name' => $display_name,
                    'tel' => $tel,
                    'address' => $address,
                    'role' => $role,
                );
                update_account_by_id($data, $id);
                $success['update_account'] = "<p class='alert alert-success'><strong>Cập nhật thành công!</strong></p>";
            }
        }
        #LẤY THÔNG TIN ACCOUNT
        $info_account = get_account_by_id($id);
        $data['info_account'] = $info_account;
        load_view('update_team', $data);
    } else {
        $error['role'] = "<p class='alert-danger text-center'><strong>Bạn chưa được cấp quyền xử lý phần này!</strong></p>";
        load_view('update_team');
    }
}

function deleteAction() {
    global $error;
    //    Kiểm tra quyền
    if (is_admin()) {
        $id = (int) $_GET['id'];
        delete_account_by_id($id);
        redirect('?mod=users&controller=team');
    } else {
        $error['role'] = "<p><strong>Bạn chưa được cấp quyền xử lý phần này!</strong></p>";
        echo "<p class='alert-danger text-center'><strong>Bạn chưa được cấp quyền xử lý phần này!</strong></p><a href='?mod=users&controller=team'>Quay lại</a>";
    }
}

function loginAction() {
    global $error, $username;
    if (isset($_POST['btn_login'])) {
        $error = array();
        if (empty($_POST['username'])) {
            $error['username'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "<p class='text-warning'>Tài khoản không chính xác</p>";
            } else {
                $username = $_POST['username'];
            }
        }
        if (empty($_POST['password'])) {
            $error['password'] = "<p class='text-warning'>Không được để trống trường này</p>";
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = "<p class='text-warning'>Mật khẩu không chính xác</p>";
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = "<p class='text-warning'>Mật khẩu không chính xác</p>";
                } else {
                    $password = md5($_POST['password']);
                }
            }
        }
        if (empty($error)) {
            if (check_login($username, $password)) {

                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                redirect();
            } else {
                $error['account'] = "<p class='text-warning'>Tài khoản hoặc mật khẩu không tồn tại</p>";
            }
        }
    }
    load_view('login');
}

function forgetPassAction() {
    global $error, $email;
    if (isset($_POST['btn_confirm_email'])) {
        if (empty($_POST['email'])) {
            $error['email'] = "<p class='text-warning'>Bạn chưa nhập email !</p>";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "<p class='text-warning'>Sai định dạng email !</p>";
            } else {
                if (!exits_email($_POST['email'])) {
                    $error['email'] = "<p class='text-warning'>Email không tồn tại !</p>";
                } else {
                    $email = $_POST['email'];
                }
            }
        }

        if (empty($error)) {
            $reset_token = md5($email . time());
            $data['reset_token'] = $reset_token;
//            Cập nhật reset_token cho db
            update_reset_token($data, $email);
            $title = 'Thay đổi mật khẩu';
            $link = base_url("?mod=users&controller=team&action=penddingPass&reset_token={$reset_token}");
            $content = "<p>Chào {$email}</p>"
                    . "<p>Bạn vui lòng click vào <a href='$link'>{$reset_token}</a> để khôi phục mật khẩu</p>"
                    . "<p>ISMART</p>";

            send_mail($email, $email, $title, $content);
        }
    }
    load_view('forgetPass');
}

function penddingPassAction() {
    $reset_token = $_GET['reset_token'];
    if (exits_reset_token($reset_token)) {
        redirect("?mod=users&controller=team&action=passRecovery&reset_token={$reset_token}");
    }
}

function passRecoveryAction() {
    global $error, $success;
    if (isset($_POST['btn_new_pass'])) {
        $error = array();
        $success = array();
        # KIỂM TRA MẬT KHẨU
        if (empty($_POST['password'])) {
            $error['password'] = 'Hãy nhập Password';
        } else {
            if (!(strlen($_POST['password']) >= 6 && strlen($_POST['password']) <= 32)) {
                $error['password'] = 'Password từ 6 - 32 ký tự';
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = 'Viết hoa ký tự đầu tiên';
                } else {
                    $password = md5($_POST['password']);
                }
            }
        }
        # KIỂM TRA NHẬP LẠI MẬT KHẨU
        if (empty($_POST['re_password'])) {
            $error['re_password'] = 'Bạn chưa nhập Re-Password';
        } else {
            if (!(strlen($_POST['re_password']) >= 6 && strlen($_POST['re_password']) <= 32)) {
                $error['re_password'] = 'Password từ 6 - 32 ký tự';
            } else {
                if (!is_password($_POST['re_password'])) {
                    $error['re_password'] = 'Viết hoa ký tự đầu tiên';
                } else {
                    if ($_POST['re_password'] === $_POST['password']) {
                        $re_password = md5($_POST['re_password']);
                        $data['password'] = $re_password;
                        $reset_token = $_GET['reset_token'];
                        update_pass_by_token($data, $reset_token);
                        $success['update_pass'] = "Cập nhật mật khẩu mời thành công!";
                        
                    } else {
                        $error['re_password'] = "Mật khẩu không khớp nhau";
                    }
                }
            }
        }
    }
    load_view('passRecovery');
}
