<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('helper', 'get');
    $media = get_media_by_page(); 
    $data = array(
        'media' => $media
    );

    load_view('index', $data);
}
