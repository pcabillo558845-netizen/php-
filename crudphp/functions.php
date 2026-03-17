<?php
function validateNumber($value) {
    return is_numeric($value) && (float)$value >= 0;
}
 
function checkAvailability($stock) {
    return $stock > 0 ? 'Yes' : 'No';
}
 
function redirectTo($page) {
    header("Location: $page");
    exit();
}

session_start();

function isLoggedIn($pdo) {
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    
    // Check remember me cookie
    if (isset($_COOKIE['remember_token'])) {
        $token = $_COOKIE['remember_token'];
        $stmt = $pdo->prepare("SELECT id FROM users WHERE remember_token = ?");
        $stmt->execute([$token]);
        $user = $stmt->fetch();
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
    }
    return false;
}

function requireLogin($pdo) {
    if (!isLoggedIn($pdo)) {
        redirectTo('login.php');
    }
}

function setRememberToken($pdo, $user_id) {
    $token = bin2hex(random_bytes(50));
    $stmt = $pdo->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
    $stmt->execute([$token, $user_id]);
    setcookie('remember_token', $token, time() + (86400 * 30), "/"); // 30 days
}

function clearRememberToken($pdo, $user_id) {
    $stmt = $pdo->prepare("UPDATE users SET remember_token = NULL WHERE id = ?");
    $stmt->execute([$user_id]);
}
?>

