<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <?php echo form_success('update_status')?>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail"><?php echo $bill['bill_id']?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php $customer = get_customer_by_id($bill['customer_id']); echo $customer['address']?> / <?php echo $customer['phone'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail">Thanh toán tại nhà</span>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <select name="status">
                                <option <?php if($bill['status'] == '0') echo "selected=''" ?> value='0'>Chờ duyệt</option>
                                <option <?php if($bill['status'] == '1') echo "selected=''" ?> value='1'>Đang vận chuyển</option>
                                <option <?php if($bill['status'] == '2') echo "selected=''" ?> value='2'>Hoàn thành</option>                            
                            </select>
                            <input type="submit" name="btn_update_bill" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <?php if(!empty($bill_detail)){?>
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $temp = 0;
                            foreach ($bill_detail as $value) {
                                $temp++;
                            ?>
                            <tr>
                                <td class="thead-text"><?php echo $temp;?></td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img src="<?php echo get_product_avatar($value['product_avatar'])?>" alt="">
                                    </div>
                                </td>
                                <td class="thead-text"><?php echo $value['product_name']?></td>
                                <td class="thead-text"><?php echo currency_format($value['price'])?></td>
                                <td class="thead-text"><?php echo $value['qty']?></td>
                                <td class="thead-text"><?php echo currency_format($value['sub_total'])?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <?php }?>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo $bill['num_order']?> sản phẩm</span>
                            <span class="total"><?php echo currency_format($bill['total']) ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>