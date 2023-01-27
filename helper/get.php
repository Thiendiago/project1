<?php

function get_product_avatar($link){
    if(!empty($link)){
        return "admin/public/uploads/images/{$link}";
    }
    return false;
}

