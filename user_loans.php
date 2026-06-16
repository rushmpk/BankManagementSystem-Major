<?php
include 'db.php';

// Assume user enters name to see their loans
$user_name = $_GET['name'] ?? '';

if (!$user_name) {
    echo "<form method='get' class='name-form'>
            <label>Enter Your Name:</label>
            <input type='text' name='name' required>
            <button type='submit'>View Loans</button>
          </form>";
    exit;
}

// Fetch approved loans for this user
$stmt = $conn->prepare("SELECT * FROM loans WHERE name=? AND status='Approved'");
$stmt->bind_param("s", $user_name);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Approved Loans</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            padding: 30px;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px 0;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        table th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .back-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #28A745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .back-btn:hover {
            background-color: #218838;
        }
        .name-form input[type="text"] {
            padding: 8px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .name-form button {
            padding: 8px 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .name-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Approved Loans for <?= htmlspecialchars($user_name) ?></h2>

<?php if ($result->num_rows == 0): ?>
    <p>No approved loans found.</p>
<?php else: ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Loan Type</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Applied On</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['loan_type'] ?></td>
            <td><?= $row['loan_amount'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>

<a href="index.php" class="back-btn">Back to Home</a>

<?php
$stmt->close();
$conn->close();
?>
</body>
</html>