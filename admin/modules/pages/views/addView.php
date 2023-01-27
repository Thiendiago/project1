<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right"> 
            <?php echo form_error('add_page') ?>
            <?php echo form_success('add_page') ?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="page_name">Tên trang</label>
                        <input type="text" name="page_name" id="page_name">
                        <label for="desc">Nội dung</label>
                        <textarea name="page_content" id="desc" class="ckeditor"></textarea>
                        <button type="submit" name="btn_add" id="btn-submit">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>