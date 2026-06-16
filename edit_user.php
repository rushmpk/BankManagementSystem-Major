<?php
$servername = "localhost";
$dbUsername = "root";
$password = "";
$dbname = "banking";

$conn = new mysqli($servername, $dbUsername, $password, $dbname);

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $accounttype = $_POST['accounttype'];

    $sql = "UPDATE accounts SET fullname=?, email=?, accounttype=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $fullname, $email, $accounttype, $id);
    $stmt->execute();

    echo "✅ User updated successfully. <a href='view_users.php'>Back to list</a>";
} else {
    $sql = "SELECT * FROM accounts WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        ?>
        <head>
            <style>
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

  form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    max-width: 400px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }

  label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
    color: #34495e;
  }

  input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  button {
    background-color: #3498db;
    color: white;
    padding: 10px 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 15px;
  }

  button:hover {
    background-color: #2980b9;
  }

  .success {
    background: #dff0d8;
    padding: 10px;
    border-radius: 4px;
    color: #3c763d;
    margin-bottom: 15px;
  }
</style>
            </style>
        </head>
       <form method="POST">
    <label>Name:</label>
    <input type="text" name="fullname" value="<?php echo htmlspecialchars($row['fullname']); ?>">

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">

    <label>Account Type:</label>
    <select name="accounttype">
        <option value="Savings" <?php if ($row['accounttype']=="Savings") echo "selected"; ?>>Savings</option>
        <option value="Current" <?php if ($row['accounttype']=="Current") echo "selected"; ?>>Current</option>
    </select>

    <button type="submit">💾 Save</button>
</form>
        <?php
    } else {
        echo "User not found.";
    }
}
$conn->close();
?>