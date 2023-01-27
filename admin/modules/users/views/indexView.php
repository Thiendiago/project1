<?php
//show_array($list_users);
?>
<?php
get_header();
?>


<!--<html>
    <head>
        <title>Danh sách thành viên</title>
    </head>
    <body>-->
<div id="content">
    <h1>Danh sách thành viêne</h1>
    <?php
    if (!empty($list_users)) {
        ?>
        <table>
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td>Tuổi</td>
                    <td>Thu nhập</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $temp = 1;
                foreach ($list_users as $value) {
                    $temp++;
                    ?>
                    <tr>
                        <td><?php echo $temp ?></td>
                        <td><?php echo $value['fullname'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['age'] ?></td>
                        <td><?php echo currency_format($value['earn'], '$') ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>
<!--    </body>
</html>-->

<?php
get_footer();
?>