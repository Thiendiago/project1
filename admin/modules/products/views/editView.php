<?php get_header(); ?>
<?php
//show_array($_POST);
//show_array($_FILES);
//show_array($products);
//show_array(get_all_cat());

?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <?php echo form_success('update_product')?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form id="form-upload-single" method="POST" enctype="multipart/form-data">
                        <label for="product-name">Tên sản phẩm</label>
                        <?php echo form_error('product_name')?>
                        <input type="text" name="product_name" id="product-name" value="<?php echo $products['product_name']?>">
                        <label for="product-code">Mã sản phẩm</label>
                        <?php echo form_error('code')?>
                        <input type="text" name="code" id="product-code" value="<?php echo $products['code']?>">
                        <label for="price">Giá sản phẩm</label>
                        <?php echo form_error('price')?>
                        <input type="text" name="price" id="price" value="<?php echo $products['price']?>">
                        <label for="qty">Số lượng</label>
                        <?php echo form_error('qty')?>
                        <input type="number" min="1" name="qty" id="qty" value="<?php echo $products['qty']?>">
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"><?php echo $products['product_desc']?></textarea>
                        <label for="content">Chi tiết</label>
                        <textarea name="content" id="content" class="ckeditor"><?php echo $products['product_content']?></textarea>
                        <label>Hình ảnh</label>
                        <?php echo form_error('avatar')?>
                        <div id="uploadFile">
                            <input type="file" name="file" id="file" data-uri="?mod=posts&controller=index&action=process">
                            <input type="submit" name="btn-upload-thumb" value="Upload" id="upload_single_bt">
                            <img id="show_list_file" src="<?php echo get_product_avatar($products['product_avatar'])?>" >
                        </div>
                        <label>Danh mục sản phẩm</label>
                        <?php echo form_error('cat_name')?>
                        <select name="cat_name">
                            <option value="">-- Chọn danh mục --</option>
                            <?php
                            if(!empty(get_all_cat())){
                            foreach(get_all_cat() as $value){
                            ?>
                            <option <?php if($products['cat_id'] == $value['cat_id']) echo "selected=''"?> value="<?php echo $value['cat_id']?>"><?php echo $value['cat_name']?></option>
                            <?php }} ?>
                        </select>
                        <label>Trạng thái</label>
                        <?php echo form_error('status')?>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option <?php if($products['status'] == '0') echo "selected=''"?> value="0">Chờ duyệt</option>
                            <option <?php if($products['status'] == '1') echo "selected=''"?> value="1">Duyệt</option>
                        </select>
                        <button type="submit" name="btn_edit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>