<?php
$lifetime = 1800;
session_set_cookie_params($lifetime);

session_start();
include_once "dbcon.php";
function is_logged_in() {
    return isset($_SESSION['user']);
}

function is_admin() {
    return (is_logged_in() && $_SESSION['user']['role'] === 'admin');
}
function logout() {
    unset($_SESSION['user']);
    header('Location: sephora.php');
    exit();
}
?>