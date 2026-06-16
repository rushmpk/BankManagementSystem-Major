<?php
session_start();

echo "<link rel='stylesheet' href='user.css'>";

if (!isset($_SESSION['userid'])) {
  echo "❌ No user ID found in session.";
    echo "  <h1><a href='user_loans.php'>Loans details</a></h1>";
  exit();
}

$servername = "localhost";
$dbUsername = "root";
$password = "";
$dbname = "banking";

$conn = new mysqli($servername, $dbUsername, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['userid'];
$result = $conn->query("SELECT * FROM accounts WHERE id = $userId");

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo "<h2>👤 Account Details</h2>";
  echo "<table border='1' cellpadding='10'>";
  echo "<tr><th>Field</th><th>Value</th></tr>";
  foreach ($row as $key => $value) {
    echo "<tr><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
  }
  echo "</table>";
  echo "<br><button onclick='window.print()'>🖨️ Print This Page</button>";
  echo "<br><a href='index.php'>🏠 Home</a>";
    echo "  <h1><a href='user_loans.php'>Loans details</a></h1>";
} else {
  echo "❌ No account found for this user.";

}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

</body>
</html>