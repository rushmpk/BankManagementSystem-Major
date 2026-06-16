<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "banking";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);
//$hashed = password_hash($password, PASSWORD_DEFAULT); // Secure hashing

// Check if username already exists
$checkSql = "SELECT id FROM bank WHERE username = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $username);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    echo "⚠️ Username already exists. Please choose a different one.";echo"&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo"<a style='color:red;font-size :30px;'' href='signupbanksignup.html'>RETRY</a>";
} else {
    // Insert new user
    $sql = "INSERT INTO bank (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "✅ Account created successfully. <a href='loginbanklogin.html'>Login here</a>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
}

$checkStmt->close();
$conn->close();
?>