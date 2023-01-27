<?php
get_header();
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="?mod=users&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Nhóm quản trị</h3>
            </div>
        </div>
        <?php get_sidebar('users'); ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo count($all_admin) ?>)</span></a></li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên hiển thị</span></td>
                                    <td><span class="thead-text">Tên đăng nhập</span></td>
                                    <td><span class="thead-text">Vai trò</span></td>
                                    <td><span class="thead-text">Thời gian tạo</span></td>
                                </tr>
                            </thead>
                            <?php
                            if (!empty($all_admin)) {
                                ?>
                                <tbody>
                                    <?php
                                    $temp = 0;
                                    foreach ($all_admin as $value) {
                                        $temp++;
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $temp ?></h3></span>

                                            <td><span class="tbody-text"><?php echo $value['display_name'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $value['username'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo convert_role($value['role']) ?></span></td>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <p><?php echo date('d/m/Y - H:i:s', $value['created_at']) ?></p>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=users&controller=team&action=update&id=<?php echo $value['ad_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="?mod=users&controller=team&action=delete&id=<?php echo $value['ad_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } ?>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên hiển thị</span></td>
                                    <td><span class="thead-text">Tên đăng nhập</span></td>
                                    <td><span class="thead-text">Vai trò</span></td>
                                    <td><span class="thead-text">Thời gian tạo</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
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
get_footer();
?>