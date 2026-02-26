<?php
require "db.php";
 
$name = $_POST['name'];
 
$sql = "SELECT * FROM users WHERE name = :name";
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $name]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
foreach ($rows as $row) {
    echo $row['name'] . "<br>";
}
?>