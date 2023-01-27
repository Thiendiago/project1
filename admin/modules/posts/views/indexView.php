<?php get_header(); ?>
<?php
//show_array($_SESSION);
//if(is_admin()){
//    echo 'đây là admin';
//}else{
//    echo 'ko phải admin';
//}

?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <?php echo form_error('role')?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="?mod=posts&controller=index&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo get_total_posts() ?>)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(<?php echo get_num_by_status('1')?>)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count">(<?php echo get_num_by_status('0')?>)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="search">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
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
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian tạo</span></td>
                                    </tr>
                                </thead>
                                <?php
                                if (!empty($all_posts)) {
                                    ?>
                                    <tbody>
                                        <?php
                                        $temp = 0;
                                        foreach ($all_posts as $value) {
                                            $temp++;
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="item[]" value="<?php echo $value['post_id']?>" class="checkItem"></td>
                                                <td><span class="tbody-text"><?php echo $temp ?></span>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="" title=""><?php echo $value['post_title'] ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="?mod=posts&controller=index&action=edit&id=<?php echo $value['post_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="?mod=posts&controller=index&action=delete&id=<?php echo $value['post_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo convert_status($value['status']) ?></span></td>
                                                <td><span class="tbody-text"><?php echo $value['creator'] ?></span></td>
                                                <td><span class="tbody-text"><?php echo date('d/m/Y - H:i:s', $value['created_at']) ?></span></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <?php
                                }
                                ?>
                                <tfoot>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="tfoot-text">STT</span></td>
                                        <td><span class="tfoot-text">Tiêu đề</span></td>
                                        <td><span class="tfoot-text">Trạng thái</span></td>
                                        <td><span class="tfoot-text">Người tạo</span></td>
                                        <td><span class="tfoot-text">Thời gian tạo</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                        <?php if(isset($page) && isset($num_page))echo get_pagging('posts',$page, $num_page)?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>