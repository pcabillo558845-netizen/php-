<?php
require "db.php";
 
$name = $_POST['name'];
 
$sql = "SELECT * FROM users WHERE name = '$name'";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
foreach ($rows as $row) {
    echo $row['name'] . "<br>";
}
?>