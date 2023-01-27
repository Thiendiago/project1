<?php

function status_qty($qty){
    if($qty > 0){
        return 'Còn hàng';
    }else{
        return 'Tạm hết hàng';
    }
}