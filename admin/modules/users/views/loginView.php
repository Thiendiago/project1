<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Đăng nhập</title>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/import/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="wp-form-login">
            <h1>Đăng nhập</h1>
            <form id="form-login" action="" method="POST">
                <input type="text" id="username" class="form-input" name="username" placeholder="Username" value="<?php echo set_value('username') ?>">
                <p><?php echo form_error('username') ?></p>
                <input type="password" id="password" class="form-input" name="password" placeholder="Password" value="">
                <p><?php echo form_error('password') ?></p>
                <p><?php echo form_error('account') ?></p>
                <!--<label><input type="checkbox" name="remember_me">Ghi nhớ đăng nhập</label>-->
                <input type="submit" id="btn-login" class="form-input" name="btn_login" value="Đăng nhập">
            </form>
            <div>
                <a href="?mod=users&controller=team&action=forgetPass">Quên mật khẩu?</a>
            </div>
    </body>
</html>
