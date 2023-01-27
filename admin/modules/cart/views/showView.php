<?php
get_header();
?>
<?php
$list_buy = !empty($_SESSION['cart']['buy']) ? $_SESSION['cart']['buy'] : false;
if (!empty($list_buy)) {
    foreach ($list_buy as &$value) {
        $value['url_delete_cart'] = "?mod=cart&controller=index&action=delete&id={$value['id']}";
    }
}

unset($value);
//show_array($_SESSION);
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Giỏ hàng</h3>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <?php
                if (!empty($list_buy)) {
                    ?>
                    <form action="?mod=cart&controller=index&action=update" method="POST">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_buy as $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value['code'] ?></td>
                                        <td>
                                            <a href="<?php echo $value['url'] ?>" title="" class="thumb">
                                                <img src="<?php echo $value['product_thumb'] ?>" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo $value['url'] ?>" title="<?php echo $value['product_title'] ?>" class="name-product"><?php echo $value['product_title'] ?></a>
                                        </td>
                                        <td class="price"><?php echo currency_format($value['price']) ?></td>
                                        <td>
                                            <input type="number" min="1" max="10" data-id="<?php echo $value['id'] ?>" name="qty[<?php echo $value['id'] ?>]" value="<?php echo $value['qty'] ?>" class="num-order">
                                        </td>
                                        <td id="sub-total-<?php echo $value['id'] ?>" ><?php echo currency_format($value['sub_total']) ?></td>
                                        <td>
                                            <a href="<?php echo $value['url_delete_cart'] ?>" title="Xóa sản phẩm" class="del-product"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá: <span id="total-price-products"><?php echo currency_format(get_total_cart()) ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <input type="submit" name="btn_update" id="update-cart" value="Cập nhật giỏ hàng">
                                                <a href="?mod=cart&controller=index&action=checkout" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                    <?php
                } else {
                    echo "<strong>Không có sản phẩm nào trong giỏ hàng</strong>";
                }
                ?>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&controller=index&action=delete_all" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>