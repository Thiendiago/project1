<?php
get_header();
?>
<?php
//show_array($_SESSION);
//show_array($list_products);
//show_array($_POST);
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <?php if (!empty($_SESSION['cart']['buy'])) { ?>
                    <form action="?mod=cart&action=update" method="POST">
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
                                foreach ($_SESSION['cart']['buy'] as $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value['code'] ?></td>
                                        <td>
                                            <a href="" title="" class="thumb">
                                                <img src="<?php echo get_product_avatar($value['product_avatar']) ?>" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" title="" class="name-product"><?php echo $value['product_name'] ?></a>
                                        </td>
                                        <td class="price"><?php echo currency_format($value['price']) ?></td>
                                        <td>
                                            <input type="number" min="1" data-id="<?php echo $value['id'] ?>" name="qty[<?php echo $value['id']?>]" value="<?php echo $value['qty'] ?>" class="num-order">
                                        </td>
                                        <td id="sub-total-<?php echo $value['id'] ?>"><?php echo currency_format($value['sub_total']) ?></td>
                                        <td>
                                            <a href="?mod=cart&action=delete&id=<?php echo $value['id']?>" title="Xóa" class="del-product"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
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
<!--                                                <input type="submit" title="cập nhật giỏ hàng" id="update-cart" name="btn_update_cart" value="Cập nhật giỏ hàng" >-->
                                                <a href="?mod=cart&action=checkout" title="thanh toán" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                <?php }else{
                    echo "<p class='text-center'><strong>BẠN VUI LÒNG THÊM SẢN PHẨM VÀO GIỎ HÀNG!</strong></p>";
                } ?>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?mod=home" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&action=delete_all" title="Xóa giỏ hàng" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>