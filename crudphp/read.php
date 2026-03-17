<?php
require 'db.php';
require 'functions.php';
requireLogin($pdo);
$stmt = $pdo->query("SELECT * FROM eresources ORDER BY id DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<h2>E-Resources List</h2>
<a href="index.php">Add New</a> | <a href="logout.php">Logout</a>
 
 
<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Resource Type</th>
    <th>Stock</th>
    <th>Available</th>
    <th>Action</th>
</tr>
 
 
<?php foreach ($rows as $row): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['title'] ?></td>
    <td><?= $row['resource_type'] ?></td>
    <td><?= $row['stock'] ?></td>
    <td><?= $row['available'] ?></td>
    <td>
        <a href="update.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>

