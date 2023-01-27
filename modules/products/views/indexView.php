<?php
get_header();
?>
<?php

?>

<div id="main-content-wp" class="category-product-page">
    <div class="wp-inner clearfix">
        <?php 
        get_sidebar();
        ?>
        <div id="content" class="fl-right">
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $list_cat_products['cat_title']?></h3>
                    <p class="section-desc">Có <?php echo count($list_products)?> sản phẩm trong mục này</p>
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
                            <a href="<?php echo $value['url']?>" title="" class="thumb">
                                <img src="<?php echo $value['product_thumb']?>" alt="">
                            </a>
                            <a href="<?php echo $value['url']?>" title="" class="title"><?php echo $value['product_title']?></a>
                            <p class="price"><?php echo currency_format($value['price'])?></p>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="section" id="pagenavi-wp">
                <div class="section-detail">
                    <ul id="list-pagenavi">
                        <li class="active">
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                    <a href="" title="" class="next-page"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>