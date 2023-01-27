<?php 
$selling_products = get_selling_products();
if(!empty($selling_products)){
?>
<div class="section" id="selling-wp">
    <div class="section-head">
        <h3 class="section-title">Sản phẩm bán chạy</h3>
    </div>
    <div class="section-detail">
        <ul class="list-item">
            <?php foreach ($selling_products as $value) {
            ?>
            <li class="clearfix">
                <a href="?mod=products&action=detail&id=<?php echo $value['product_id']?>" title="" class="thumb fl-left">
                    <img src="<?php echo get_product_avatar($value['product_avatar'])?>" alt="">
                </a>
                <div class="info fl-right">
                    <a href="?mod=products&action=detail&id=<?php echo $value['product_id']?>" title="" class="product-name"><?php echo $value['product_name']?></a>
                    <div class="price">
                        <span class="new"><?php echo currency_format($value['price']) ?></span>
                        <!--<span class="old">7.190.000đ</span>-->
                    </div>
                    <a href="?mod=cart&action=buy_now&id=<?php echo $value['product_id']?>" title="" class="buy-now">Mua ngay</a>
                </div>
            </li>
            <?php }?>
        </ul>
    </div>
</div>
<?php }?>