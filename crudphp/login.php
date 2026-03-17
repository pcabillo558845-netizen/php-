<?php
require 'db.php';
require 'functions.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);
    
    if (empty($username) || empty($password)) {
        $error = "Please fill all fields.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            
            if ($remember) {
                setRememberToken($pdo, $user['id']);
            }
            
            redirectTo('read.php');
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<?php if ($error): ?><p style="color:red;"><?= $error ?></p><?php endif; ?>
<form method="POST">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <label><input type="checkbox" name="remember"> Remember Me</label><br><br>
    <button type="submit">Login</button>
</form>
<br>
<a href="register.php">Register New Account</a>
</body>
</html>

