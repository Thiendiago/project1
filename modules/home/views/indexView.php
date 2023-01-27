<?php
get_header();
?>
<?php
//show_array($highlight_products);
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/slider-01.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-02.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-03.png" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">0377.499.804</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <?php if(!empty($highlight_products)){?>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php foreach($highlight_products as $value){?>
                        <li>
                            <a href="?mod=products&action=detail&id=<?php echo $value['product_id']?>" title="" class="thumb">
                                <img src="<?php echo get_product_avatar($value['product_avatar'])?>">
                            </a>
                            <a href="?mod=products&action=detail&id=<?php echo $value['product_id']?>" title="" class="product-name"><?php echo $value['product_name']?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($value['price'])?></span>
<!--                                <span class="old">6.190.000đ</span>-->
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=add&id=<?php echo $value['product_id']?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=buy_now&id=<?php echo $value['product_id']?>" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <?php }?>
            <?php 
            if(!empty($list_product_cat)){
                foreach($list_product_cat as $value){
            ?>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $value['cat_name']?></h3>
                </div>
                <?php
                $list_products = get_list_products_by_cat_id($value['cat_id']);
                if(!empty($list_products)){
                ?>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php 
                        foreach($list_products as $item){
                        ?>
                        <li>
                            <a href="?mod=products&action=detail&id=<?php echo $item['product_id'] ?>" title="" class="thumb">
                                <img src="<?php echo get_product_avatar($item['product_avatar']) ?>">
                            </a>
                            <a href="?mod=products&action=detail&id=<?php echo $item['product_id'] ?>" title="" class="product-name"><?php echo $item['product_name']?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['price'])?></span>
                                <!--<span class="old">8.990.000đđ</span>-->
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=add&id=<?php echo $item['product_id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=buy_now&id=<?php echo $item['product_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <?php }?>
            </div>
                <?php }}?>
        </div>
        <div class="sidebar fl-left">
            <?php get_sidebar('cat')?>
            <?php get_sidebar('selling')?>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>