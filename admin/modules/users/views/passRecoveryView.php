<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Đổi mật khẩu</title>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/import/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wp-form-login">
            <h1>mật khẩu mới</h1>
            <form id="form-login" action="" method="POST">
                <input type="password" id="password" class="form-input" name="password" placeholder="New-Password" value="">
                <p><?php echo form_error('password') ?></p>
                <input type="password" id="re-password" class="form-input" name="re_password" placeholder="Re-Password" value="">
                <p><?php echo form_error('re_password') ?></p>
                <p><?php echo form_success('update_pass') ?></p>
                <input type="submit" id="btn-login" class="form-input" name="btn_new_pass" value="Xác nhận">
            </form>
            <div>
                <a href="?mod=users&controller=team&action=login">Đăng nhập</a>
            </div>
        </div>
    </body>
</html>
