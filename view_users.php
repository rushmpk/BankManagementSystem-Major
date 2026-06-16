<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>All User Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f9f9f9;
    }
    h2 {
      color: #2c3e50;
    }
    form {
      margin-bottom: 20px;
    }
    input, select {
      padding: 6px;
      margin-right: 10px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      background-color: #fff;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #eaeaea;
    }
    a, button {
      display: inline-block;
      margin-top: 20px;
      padding: 8px 12px;
      background-color: #3498db;
      color: white;
      border: none;
      text-decoration: none;
      cursor: pointer;
    }
    .clear-btn {
      background-color: #95a5a6;
    }
    .action-buttons {
  display: flex;
  gap: 10px; /* spacing between buttons */
}

.btn {
  padding: 6px 10px;
  text-decoration: none;
  color: white;
  border-radius: 4px;
  font-size: 14px;
}

.view-btn {
  background-color: #3498db; /* blue */
}

.edit-btn {
  background-color: #f39c12; /* orange */
}

.delete-btn {
  background-color: #e74c3c; /* red */
}
    
  </style>
</head>
<body>

<h2>👥 All Registered Users</h2>

<form method="GET" action="">
  <input type="text" name="fullname" placeholder="Search by Name" value="<?php echo htmlspecialchars($_GET['fullname'] ?? '') ?>">
  <input type="text" name="email" placeholder="Search by Email" value="<?php echo htmlspecialchars($_GET['email'] ?? '') ?>">
  <select name="accounttype">
    <option value="">-- Account Type --</option>
    <option value="Savings" <?php if ($_GET['accounttype'] ?? '' === 'Savings') echo 'selected'; ?>>Savings</option>
    <option value="Current" <?php if ($_GET['accounttype'] ?? '' === 'Current') echo 'selected'; ?>>Current</option>
  </select>
  <button type="submit">🔍 Filter</button>
  <a href="view_users.php" class="clear-btn">❌ Clear Filter</a>
</form>

<?php
$servername = "localhost";
$dbUsername = "root";
$password = "";
$dbname = "banking";

$conn = new mysqli($servername, $dbUsername, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Build filter query
$conditions = [];
if (!empty($_GET['fullname'])) {
  $name = $conn->real_escape_string($_GET['fullname']);
  $conditions[] = "fullname LIKE '%$name%'";
}
if (!empty($_GET['email'])) {
  $email = $conn->real_escape_string($_GET['email']);
  $conditions[] = "email LIKE '%$email%'";
}
if (!empty($_GET['accounttype'])) {
  $type = $conn->real_escape_string($_GET['accounttype']);
  $conditions[] = "accounttype = '$type'";
}

$whereClause = count($conditions) ? "WHERE " . implode(" AND ", $conditions) : "";
$sql = "SELECT * FROM accounts $whereClause";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr>";
  while ($fieldinfo = $result->fetch_field()) {
    echo "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
  }
  echo "</tr>";

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
foreach ($row as $key => $value) {
    echo "<td>" . htmlspecialchars($value) . "</td>";
}
echo "<td class='action-buttons'>
        <a href='view_user.php?id=" . urlencode($row['id']) . "' class='btn view-btn'>👁️ View</a>
        <a href='edit_user.php?id=" . urlencode($row['id']) . "' class='btn edit-btn'>✏️ Edit</a>
        <a href='delete_user.php?id=" . urlencode($row['id']) . "' class='btn delete-btn' onclick=\"return confirm('Are you sure you want to delete this user?');\">🗑️ Delete</a>
      </td>";
  }

  echo "</table>";
} else {
  echo "<p>No matching records found.</p>";
}

echo "<br><a href='admin_home.php'>🏠 Back to Home</a>";
echo "<br><button onclick='window.print()'>🖨️ Print This Page</button>";

$conn->close();
?>

</body>
</html>