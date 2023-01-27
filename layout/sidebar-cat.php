<div class="section" id="category-product-wp">
    <div class="section-head">
        <h3 class="section-title">Danh mục sản phẩm</h3>
    </div>
    <div class="secion-detail">
        <?php 
        if(!empty(get_list_cat_product())){
            
        ?>
        <ul class="list-item">
            <?php
                foreach (get_list_cat_product() as $value) {
            ?>
            <li>
                <a href="?mod=products&controller=index&action=cat&id=<?php echo $value['cat_id']?>" title=""><?php echo $value['cat_name']?></a>
            </li>
            <?php }?>
        </ul>
        <?php  }?>
    </div>
</div>
