<?php
$host = "localhost";
$dbname = "pdo_lab";
$username = "root";
$password = "";
 
$pdo = new PDO(
    "mysql:host=$host;dbname=$dbname",
    $username,
    $password
);
 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>