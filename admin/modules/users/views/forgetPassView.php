<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Quên mật khẩu</title>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/import/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wp-form-login">
            <h1>NHẬP EMAIL</h1>
            <form id="form-login" action="" method="POST">
                <input type="text" id="email" class="form-input" name="email" placeholder="Email" value="<?php echo set_value('email') ?>">
                <p><?php echo form_error('email') ?></p>                
                <input type="submit" id="btn-login" class="form-input" name="btn_confirm_email" value="Gửi Xác Nhận">
            </form>
            <div>
                <a href="?mod=users&controller=team&action=login">Đăng nhập</a>
        </div>
    </body>
</html>

