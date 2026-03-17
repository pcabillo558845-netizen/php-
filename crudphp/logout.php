<?php
session_start();
if (isset($_SESSION['user_id'])) {
    require 'db.php';
    require 'functions.php';
    clearRememberToken($pdo, $_SESSION['user_id']);
}

session_destroy();
setcookie('remember_token', '', time() - 3600, '/');
header("Location: login.php");
exit();
?>

