<?php get_header()?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php if(!empty($list_posts)){  ?>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php 
                        foreach ($list_posts as $value) {
                        ?>
                        <li class="clearfix">
                            <a href="?mod=posts&action=detail&id=<?php echo $value['post_id']?>" title="" class="thumb fl-left">
                                <img src="<?php echo get_product_avatar($value['post_avatar'])?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?mod=posts&action=detail&id=<?php echo $value['post_id']?>" title="" class="title"><?php echo $value['post_title']?></a>
                                <span class="create-date"><?php echo date('d-m-Y',$value['created_at'])?></span>
                                <p class="desc"><?php echo $value['post_desc']?></p>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <?php
                    if($num_page > 1)
                    echo get_pagging('posts', 'index', 'index', $page, $num_page)
                    ?>
                </div>
            </div>
        </div>
        <?php }?>
        <div class="sidebar fl-left">
            <?php echo get_sidebar('selling')?>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_blog_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>