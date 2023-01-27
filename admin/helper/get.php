<?php

function get_product_avatar($link){
    if(!empty($link)){
        return "public/uploads/images/{$link}";
    }
    return false;
}

