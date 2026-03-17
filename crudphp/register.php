<?php
require 'db.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($email) || empty($password)) {
        $error = "Please fill all fields.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        // Check existing user
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        if ($stmt->fetch()) {
            $error = "Username or email already exists.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashed]);
            $success = "Registration successful! <a href='login.php'>Login here</a>.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
<h2>Register</h2>
<?php if ($error): ?><p style="color:red;"><?= $error ?></p><?php endif; ?>
<?php if ($success): ?><p style="color:green;"><?= $success ?></p><?php endif; ?>
<form method="POST">
    Username: <input type="text" name="username" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required minlength="6"><br><br>
    <button type="submit">Register</button>
</form>
<br><a href="login.php">Already have account? Login</a>
</body>
</html>

