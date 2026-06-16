<!-- admin_login.php -->
<?php
session_start();
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_user = $_POST['username'];
    $admin_pass = $_POST['password'];

    // Replace with your actual admin credentials
    if ($admin_user === "admin" && $admin_pass === "admin123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_home.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .login-box {
            width: 300px; margin: 100px auto; padding: 20px;
            background: white; border-radius: 8px; box-shadow: 0 0 10px #ccc;
        }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 10px; margin: 10px 0;
        }
        input[type="submit"] {
            width: 100%; padding: 10px; background: #007BFF; color: white; border: none;
        }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" value="Login" />
            <div class="error"><?= $error ?></div>
        </form>
        <a href="signupbanksignup.html">user login</a>
    </div>
</body>
</html>