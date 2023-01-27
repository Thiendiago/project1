<?php get_header() ?>
<?php
global $list_products;
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
                        <a href="" title="">Bộ lọc</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Có <strong><?php if (isset($list_products)) {echo count($list_products);} else{echo '0';}?></strong> sản phẩm được tìm thấy</h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_products)) {
                        ?>
                        <ul class="list-item clearfix">
                            <?php
                            foreach ($list_products as $value) {
                                ?>
                                <li>
                                    <a href="?mod=products&action=detail&id=<?php echo $value['product_id']?>" title="" class="thumb">
                                        <img src="<?php echo get_product_avatar($value['product_avatar']) ?>">
                                    </a>
                                    <a href="?mod=products&action=detail&id=<?php echo $value['product_id']?>" title="" class="product-name"><?php echo $value['product_name'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($value['price']) ?></span>
        <!--                                <span class="old">20.900.000đ</span>-->
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&action=add&id=<?php echo $value['product_id']?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&action=buy_now&id=<?php echo $value['product_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php }  ?>
                    </div>
                </div>
            </div>
            <div class="sidebar fl-left">
                <?php get_sidebar('cat') ?>
                <?php get_sidebar('filter') ?>
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
    <?php get_footer() ?>