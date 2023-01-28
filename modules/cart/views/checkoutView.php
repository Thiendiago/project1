<?php get_header()?>
<?php
//show_array($_SESSION);
//show_array($_POST);
?>
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <form method="POST" action="" name="form-checkout">
    <div id="wrapper" class="wp-inner clearfix">
        <?php echo form_success('checkout')?>
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname" value="<?php echo set_value('fullname')?>" placeholder="vo cao thien">
                            <?php echo form_error('fullname')?>
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo set_value('email')?>" placeholder="thiencaovo1996@gmail.com">
                            <?php echo form_error('email')?>
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" value="<?php echo set_value('address')?>" placeholder="75 Hồ Đắc Di - phường An Cựu - tp.Huế - T.Thiên Huế">
                            <?php echo form_error('address')?>
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone" value="<?php echo set_value('phone')?>" placeholder="0377499804">
                            <?php echo form_error('phone')?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note"><?php echo set_value('note')?></textarea>
                        </div>
                    </div>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <?php 
                if(!empty($_SESSION['cart']['buy'])){
            ?>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($_SESSION['cart']['buy'] as $value) {
                        ?>
                        <tr class="cart-item">
                            <td class="product-name"><?php echo $value['product_name']?><strong class="product-quantity">x <?php echo $value['qty']?></strong></td>
                            <td class="product-total"><?php echo currency_format($value['price'])?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price"><?php echo currency_format(get_total_cart())?></strong></td>
                        </tr>
                    </tfoot>
                </table>
<!--                <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment-method" value="direct-payment">
                            <label for="direct-payment">Thanh toán tại cửa hàng</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                    </ul>
                </div>-->
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" name="btn_checkout" value="Đặt hàng">
                </div>
            </div>
            <?php }else{
                echo "<p>Bạn vui lòng chọn sản phẩm để hiển thị thông tin đơn hàng!<p>";
            }
            ?>
        </div>
    </div>
</form>
</div>
<?php get_footer()?>