<?php
$servername = "localhost";
$dbUsername = "root";
$password = "";
$dbname = "banking";

$conn = new mysqli($servername, $dbUsername, $password, $dbname);

$id = intval($_GET['id']);
$sql = "SELECT * FROM accounts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      padding: 20px;
    }

    h2 {
      color: #2c3e50;
      margin-bottom: 20px;
    }

    .user-details {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      max-width: 500px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .user-details ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .user-details li {
      padding: 10px;
      border-bottom: 1px solid #eee;
      font-size: 15px;
      color: #34495e;
    }

    .user-details li strong {
      color: #2c3e50;
      margin-right: 8px;
    }

    .user-details li:last-child {
      border-bottom: none;
    }

    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 8px 12px;
      background-color: #3498db;
      color: white;
      border-radius: 4px;
      text-decoration: none;
      border: none;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #2980b9;
    }

    .btn.print {
      background-color: #27ae60;
    }

    .btn.print:hover {
      background-color: #1e8449;
    }
  </style>
</head>
<body>

<?php
if ($row = $result->fetch_assoc()) {
    echo "<h2>User Details</h2>";
    echo "<div class='user-details'>";
    echo "<ul>";
    foreach ($row as $key => $value) {
        echo "<li><strong>" . htmlspecialchars($key) . ":</strong> " . htmlspecialchars($value) . "</li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "<a href='view_users.php' class='btn'>⬅ Back to Users List</a> ";
    echo "<button onclick='window.print()' class='btn print'>🖨️ Print</button>";
} else {
    echo "User not found.";
}
$conn->close();
?>

</body>
</html>