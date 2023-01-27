<?php

function add_contact($data){
    db_insert('tbl_contacts', $data);
}

