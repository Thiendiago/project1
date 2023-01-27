<?php
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
        get_sidebar('users');
        ?>
        <div id="content" class="fl-right">
            <?php echo form_error('role')?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="display_name" id="display-name" value="<?php echo $info_account['display_name'] ?>">
                        <p style="color: red"><?php echo form_error('display_name') ?></p>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="" class="read-only" placeholder="<?php echo $info_account['username'] ?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_account['email'] ?>">
                        <p style="color: red"><?php echo form_error('email') ?></p>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo $info_account['tel'] ?>">
                        <p style="color: red"><?php echo form_error('tel') ?></p>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo $info_account['address'] ?></textarea>
                        <p style="color: red"><?php echo form_error('address') ?></p>
                        <button type="submit" name="btn_update_info_account" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>