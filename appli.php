<?php
session_start();
echo "<link rel='stylesheet' href='stylephp.css'>";

$servername = "localhost";
$dbUsername = "root";
$password = "";
$dbname = "banking";

$conn = new mysqli($servername, $dbUsername, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO accounts (fullname, dob, gender, address, email, phone, idproof, idnumber, accounttype, initialdeposit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssd", 
  $_POST['fullname'], 
  $_POST['dob'], 
  $_POST['gender'], 
  $_POST['address'], 
  $_POST['email'], 
  $_POST['phone'], 
  $_POST['idproof'], 
  $_POST['idnumber'], 
  $_POST['accounttype'], 
  $_POST['initialdeposit']
);

if ($stmt->execute()) {
  $userId = $conn->insert_id;
  $_SESSION['userid'] = $userId;

  // Fetch the inserted user details
  $result = $conn->query("SELECT * FROM accounts WHERE id = $userId");
  $row = $result->fetch_assoc();

  echo "<h2>✅ Account Created Successfully!</h2>";
  echo "<p>Your User ID is: <strong>$userId</strong></p>";

  // Display user details in a table
  echo "<table border='1' cellpadding='10'>";
  echo "<tr><th>Field</th><th>Value</th></tr>";
  foreach ($row as $key => $value) {
    echo "<tr><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
  }
  echo "</table>";

  echo "<br><a href='index.php'>Go to Home Page</a>";
  exit();
} else {
  echo "❌ Error: " . $stmt->error;
}
echo "<br><button onclick='window.print()'>🖨️ Print This Page</button>";

$stmt->close();
$conn->close();
?>