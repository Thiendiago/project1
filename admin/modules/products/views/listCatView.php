<?php get_header(); ?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <?php echo form_error('role')?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh mục sản phẩm</h3>
                    <a href="?mod=products&controller=index&action=addCat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo get_num_product_cat(); ?>)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(<?php echo get_num_product_cat_by_status('1'); ?>)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count">(<?php echo get_num_product_cat_by_status('0'); ?>)</span></a></li>
                        </ul>
                    </div>
                    <form method="POST" action="" class="form-actions">
                        <div class="actions">
                            <select name="actions">
                                <option value="">--- Tác vụ ---</option>
                                <option value="0">Chờ duyệt</option>
                                <option value="1">Duyệt</option>
                                <option value="2">Xóa</option>
                            </select>
                            <input type="submit" name="btn_apply" value="Áp dụng">
                        </div>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên danh mục</span></td>
                                        <td><span class="thead-text">Thứ tự</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                </thead>
                                <?php
                                if (!empty($list_cat)) {
                                    ?>
                                    <tbody>
                                        <?php
                                        $temp = 0;
                                        foreach ($list_cat as $value) {
                                            $temp++;
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="item[]" value="<?php echo $value['cat_id'] ?>" class="checkItem"></td>
                                                <td><span class="tbody-text"><?php echo $temp; ?></span>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="" title=""><?php echo $value['cat_name'] ?></a>
                                                    </div> 
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="?mod=products&controller=index&action=editCat&id=<?php echo $value['cat_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="?mod=products&controller=index&action=deleteCat&id=<?php echo $value['cat_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $value['rank'] ?></span></td>
                                                <td><span class="tbody-text"><?php echo convert_status($value['status']) ?></span></td>
                                                <td><span class="tbody-text"><?php echo $value['creator'] ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y - H:i:s', $value['created_at']) ?></span></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    <?php
                                }
                                ?>
                                <tfoot>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="tfoot-text">STT</span></td>
                                        <td><span class="tfoot-text-text">Tên danh mục</span></td>
                                        <td><span class="tfoot-text">Thứ tự</span></td>
                                        <td><span class="tfoot-text">Trạng thái</span></td>
                                        <td><span class="tfoot-text">Người tạo</span></td>
                                        <td><span class="tfoot-text">Thời gian</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php if (isset($page) && isset($num_page)) echo get_pagging($page, $num_page) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>