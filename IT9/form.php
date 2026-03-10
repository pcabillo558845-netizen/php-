<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);

    
    if (empty($name) || empty($email)) {
        $error = "All fields are required!";
    } else {
        
        $_SESSION['name']  = $name;
        $_SESSION['email'] = $email;

        setcookie("user_name", $name, time() + 3600, "/");


        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Authentication form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Login Form</h2>

<?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label>Name:</label><br>
    <input type="text" name="name"><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br>

    <button type="submit">Submit</button>
</form>

</div>
</body>
</html>