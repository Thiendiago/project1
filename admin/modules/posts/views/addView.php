<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <?php echo form_success('create_post')?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
                
            </div>
            
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form id="form-upload-single" method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <?php echo form_error('title')?>
                        <input type="text" name="title" id="title" value="<?php echo set_value('title')?>">
                        <label for="desc">Mô tả ngắn</label>
                        <?php echo form_error('desc')?>
                        <textarea name="desc" id="desc" class=""><?php echo set_value('desc')?></textarea>
                        <label>Chọn ảnh đại diện cho bài viết</label>
                        <?php echo form_error('avatar')?>
                        <div id="uploadFile">
                            <input type="file" name="file" id="file" data-uri="?mod=posts&controller=index&action=process">
                            <input type="submit" name="btn-upload-thumb" value="Upload" id="upload_single_bt">
                            <img id="show_list_file" src="public/images/img-thumb.png">
                        </div>
                        <label for="desc">Nội dung bài viết</label>
                        <?php echo form_error('content')?>
                        <textarea name="content" id="" class="ckeditor"><?php echo set_value('content')?></textarea><br>
                        <button type="submit" name="btn_add" id="btn-submit">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
