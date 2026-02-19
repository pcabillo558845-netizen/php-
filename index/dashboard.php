<?php
session_start();

// If NOT logged in, redirect to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library E-Resource Management</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .navbar {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .logout {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .logout:hover {
            background-color: #c82333;
        }
        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .feature-card {
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            width: 30%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .feature-card h3 {
            color: #007bff;
            margin-bottom: 10px;
        }
        .feature-card p {
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="navbar">Library E-Resource Management</div>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Manage your library resources efficiently and access e-resources seamlessly.</p>
        <div class="features">
            <div class="feature-card">
                <h3>Search Books</h3>
                <p>Find books and resources available in the library.</p>
            </div>
            <div class="feature-card">
                <h3>Borrow History</h3>
                <p>View your borrowing history and due dates.</p>
            </div>
            <div class="feature-card">
                <h3>Account Settings</h3>
                <p>Update your profile and manage account preferences.</p>
            </div>
        </div>
        <div style="text-align: center; margin-top: 30px;">
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </div>
</body>
</html>
