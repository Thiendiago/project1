<?php get_header() ?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a>Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Liên hệ</h3>
                </div>
                <?php echo form_success('add_contact')?>
                <div class="section-detail">
                    <div class="">
                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                                <!--<label class="control-label col-sm-2" for="fullname">Họ và tên:</label>-->
                                <div class="col-sm-10">          
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder='Họ và tên'>
                                    <?php echo form_error('fullname')?>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label col-sm-2" for="email">Email:</label>-->
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder='Email'>
                                    <?php echo form_error('email')?>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label col-sm-2" for="title">Tiêu đề:</label>-->
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title" placeholder='Tiêu đề'>
                                    <?php echo form_error('title')?>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="control-label col-sm-2" for="content">Nội dung:</label>-->
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="content" name="content" rows='8' placeholder='Nội dung'></textarea>
                                    <?php echo form_error('content')?>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class=" col-sm-10">
                                    <button type="submit" class="btn btn-default" name="btn_send">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <?php echo get_sidebar('selling'); ?>
/        </div>
    </div>
</div>
<?php get_footer(); ?>