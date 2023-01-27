
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Đăng ký</title>
        <link href="public/css/login/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/login/login.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <div id="wp-form-login">
            <h1>Đăng KÝ TÀI KHOẢN</h1>
            <form id="form-login" action="" method="POST">
                <input type="text" id="fullname" class="form-input" name="fullname" placeholder="Fullname" value="<?php echo set_value('fullname') ?>">
                <p><?php echo form_error('fullname')?></p>
                <input type="text" id="email" class="form-input" name="email" placeholder="Email" value="<?php echo set_value('email') ?>">
                <p><?php echo form_error('email')?></p>
                <input type="text" id="username" class="form-input" name="username" placeholder="Username" value="<?php echo set_value('username') ?>">
                <p><?php echo form_error('username')?></p>
                <input type="password" id="password" class="form-input" name="password" placeholder="Password" value="">
                <p><?php echo form_error('password')?></p>
                <p><?php echo form_error('accout')?></p>
                <input type="submit" id="btn-login" class="form-input" name="btn_reg" value="ĐĂNG KÝ">
            </form>
            <a href="?mod=users&controller=index&action=login">Đăng nhập</a>
        </div>
    </body>
</html>
