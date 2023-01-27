<?php get_header(); ?>
<?php
show_array($_FILES);
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <?php echo form_success('add_cat')?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="cat_name">Tên danh mục</label>
                        <?php echo form_error('cat_name')?>
                        <input type="text" name="cat_name" id="cat_name">
                        <label for="rank">Thứ tự</label>
                        <?php echo form_error('rank')?>
                        <input type="number" min = '1' name="rank" id="rank" value="<?php echo $cat['rank']?>">
                        <button type="submit" name="btn_addCat" id="btn-submit">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>