<div class="section" id="filter-product-wp">
    <div class="section-head">
        <h3 class="section-title">Bộ lọc</h3>
    </div>
    <div class="section-detail">
        <form method="POST" action="?mod=products&controller=index&action=filter">
            <table>
                <thead>
                    <tr>
                        <td colspan="2">Giá</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="radio" name="level_price" value="`price` < 500000"></td>
                        <td>Dưới 500.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="level_price" value="`price` >= 500000 && `price` <= 1000000"></td>
                        <td>500.000đ - 1.000.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="level_price" value="`price` >= 1000000 && `price` <= 5000000"></td>
                        <td>1.000.000đ - 5.000.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="level_price" value="`price` >= 5000000 && `price` <= 10000000"></td>
                        <td>5.000.000đ - 10.000.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="level_price" value="`price` > 10000000"></td>
                        <td>Trên 10.000.000đ</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <td colspan="2">Hãng</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="radio" name="company" value="msi"></td>
                        <td>MSI</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="company" value="apple%' OR `product_name` LIKE '%iphone"></td>
                        <td>Apple</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="company" value="vsmart"></td>
                        <td>Vsmart</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="company" value="lenovo"></td>
                        <td>Lenovo</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="company" value="samsung"></td>
                        <td>Samsung</td>
                    </tr>
                </tbody>
            </table>
            <?php
            if (!empty(get_list_cat_product())) {
                ?>
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Loại</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (get_list_cat_product() as $value) {
                        ?>
                        <tr>
                            <td><input type="radio" name="cat_id" value="<?php echo $value['cat_id'] ?>"></td>
                            <td><?php echo $value['cat_name']?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            <?php } ?>
            <input type="submit" name="btn_filter" value="Lọc">
        </form>
    </div>
</div>