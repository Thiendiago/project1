<?php
get_header();
?>
<?php
//show_array($_POST);
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Tạo tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
        get_sidebar('users');
        ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="">
                        <?php echo form_error('account')?>
                        <?php echo form_success('add_account')?>
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="display_name" id="display-name" value="<?php echo set_value('display_name') ;?>">
                        <?php echo form_error('display_name')?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="user_name" placeholder="" value="<?php echo set_value('username') ;?>">
                        <?php echo form_error('username')?>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo set_value('email') ;?>">
                        <?php echo form_error('email')?>
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" value="">
                        <?php echo form_error('password')?>
                        <label for="confirm_pass">Xác nhận lại mật khẩu</label>
                        <input type="password" name="confirm_pass" id="confirm_pass" value="">
                        <?php echo form_error('confirm_pass')?>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo set_value('tel') ;?>">
                        <select name="role">
                            <option value="">--- Chọn vai trò ---</option>
                            <?php
                            for($i=1; $i<=3; $i++){
                            ?>
                            <option value="<?php echo $i ?>" <?php if(set_value('role') == $i) echo 'selected'; ?>><?php echo convert_role($i); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <?php echo form_error('role')?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo set_value('tel') ;?></textarea>
                        <button type="submit" name="btn_add" id="btn-submit">Thêm tài khoản</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>