<?php
get_header();
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
            <?php echo form_error('role')?>
            <div class="section" id="detail-page">
                <?php if(!empty($info_account)){?>
                <div class="section-detail">
                    <form method="POST" action="">
                        <?php echo form_success('update_account') ?>
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="display_name" id="display-name" value="<?php echo $info_account['display_name']; ?>">
                        <?php echo form_error('display_name') ?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="" class="read-only" readonly="" placeholder="" value="<?php echo $info_account['username']; ?>">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="read-only" readonly="" value="<?php echo $info_account['email']; ?>">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo $info_account['tel']; ?>">
                        <select name="role">
                            <option value="">--- Chọn vai trò ---</option>
                            <?php
                            for($i=1; $i<=3; $i++){
                            ?>
                            <option value="<?php echo $i ?>" <?php if($info_account['role'] == $i) echo 'selected'; ?>><?php echo convert_role($i); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <?php echo form_error('role') ?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo $info_account['address']; ?></textarea>
                        <button type="submit" name="btn_update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>