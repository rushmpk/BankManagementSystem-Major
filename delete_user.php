<?php
$servername = "localhost";
$dbUsername = "root";
$password = "";
$dbname = "banking";

$conn = new mysqli($servername, $dbUsername, $password, $dbname);

$id = intval($_GET['id']);
$sql = "DELETE FROM accounts WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

echo "🗑️ User deleted successfully. <a href='view_users.php'>Back to list</a>";
$conn->close();
?>