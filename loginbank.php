 <?php
session_start();

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

$sql = "SELECT * FROM bank WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
   if ($password === $row['password']) { // login success
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ User not found.";
}

$stmt->close();
$conn->close();
?>