<?php

function is_login() {
    if (isset($_SESSION['user_login'])) {
        return $_SESSION['user_login'];
    }
    return false;
}
