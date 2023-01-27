<?php get_header()?>
<?php 
//show_array($_POST);
?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo  $list_cat_product['cat_name'] ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo  $list_cat_product['cat_name'] ?></h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị 45 trên 50 sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="4">Giá thấp lên cao</option>
                                </select>
                                <button type="submit" name="btn_sort">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <?php 
                if(!empty($list_products)){
                ?>
                    <ul class="list-item clearfix">
                        <?php
                        foreach ($list_products as $value) {
                        ?>
                        <li>
                            <a href="?mod=products&action=detail&id=<?php echo $value['product_id']?>" title="" class="thumb">
                                <img src="<?php echo get_product_avatar($value['product_avatar'])?>">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name"><?php echo $value['product_name']?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($value['price']) ?></span>
                                <!--<span class="old">20.900.000đ</span>-->
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=add&id=<?php echo $value['product_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=buy_now&id=<?php echo $value['product_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                <?php }?>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <?php echo get_pagging('products', 'index', 'cat', $page, $num_page, $cat_id);?>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <?php get_sidebar('cat')?>
            <?php get_sidebar('filter')?>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>