<?php
require 'db.php';
require 'functions.php';
requireLogin($pdo);
 
 
$id = $_GET['id'];
 
 
$stmt = $pdo->prepare("DELETE FROM eresources WHERE id = ?");
$stmt->execute([$id]);
 
 
header("Location: read.php");
?>

