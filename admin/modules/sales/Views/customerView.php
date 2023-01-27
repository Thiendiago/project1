<?php get_header() ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">

                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <form method="POST" action="" class="form-actions">
                        <div class="actions">
                            <select name="actions">
                                <option value="">Chọn tác vụ</option>
                                <option value="0">Xóa</option>
                            </select>
                            <input type="submit" name="btn_apply" value="Áp dụng">
                        </div>
                        <div class="table-responsive">
                            <?php
                            if (!empty($list_customers)) {
                                ?>
                                <table class="table list-table-wp">
                                    <thead>
                                        <tr>
                                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Họ và tên</span></td>
                                            <td><span class="thead-text">Số điện thoại</span></td>
                                            <td><span class="thead-text">Email</span></td>
                                            <td><span class="thead-text">Địa chỉ</span></td>
                                            <td><span class="thead-text">Đơn hàng</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $temp = 0;
                                        foreach ($list_customers as $value) {
                                            $temp++;
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="item[]" value="<?php echo $value['customer_id']?>" class="checkItem"></td>
                                                <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                                <td>
                                                    <div class="tb-title fl-left">
                                                        <a title=""><?php echo $value['fullname']; ?></a>
                                                    </div>
<!--                                                    <ul class="list-operation fl-right">
                                                        <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>-->
                                                </td>
                                                <td><span class="tbody-text"><?php echo $value['phone']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $value['email']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo $value['address']; ?></span></td>
                                                <td><span class="tbody-text"><?php echo get_num_bills($value['customer_id']) ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d-m-Y', $value['created_at']); ?></span></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td><span class="tfoot-body">STT</span></td>
                                            <td><span class="tfoot-body">Họ và tên</span></td>
                                            <td><span class="tfoot-body">Số điện thoại</span></td>
                                            <td><span class="tfoot-body">Email</span></td>
                                            <td><span class="tfoot-body">Địa chỉ</span></td>
                                            <td><span class="tfoot-body">Đơn hàng</span></td>
                                            <td><span class="tfoot-body">Thời gian</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer()?>