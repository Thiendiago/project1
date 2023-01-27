<?php
get_header();
?>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thay đổi mật khẩu</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
        get_sidebar('users');
        ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass_old" id="pass-old">
                        <p style="color: red"><?php echo form_error('pass_old') ?></p>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass_new" id="pass-new">
                        <p style="color: red"><?php echo form_error('pass_new') ?></p>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_pass" id="confirm-pass">
                        <p style="color: red"><?php echo form_error('confirm_pass') ?></p>
                        <p style="color: green"><?php echo form_success('update_pass') ?></p>
                        <button type="submit" name="btn_change_pass" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>