<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: form.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Dashboard</h2>

<p><strong>Welcome:</strong> <?php echo $_SESSION['name']; ?></p>
<p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>

<h3>Cookie Data</h3>
<?php
if (isset($_COOKIE['user_name'])) {
    echo "Cookie Name: " . $_COOKIE['user_name'];
} else {
    echo "No cookie found.";
}
?>

<br><br>
<a href="logout.php">Logout</a>
</div>
</body>
</html>