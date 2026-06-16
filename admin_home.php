<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home - MPK BANKING</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #e9f5ff;
            background-image: url('img/mpk banking.png');
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0; 
            padding: 0;
        }
        .container {
            background: rgba(255,255,255,0.95); 
            padding: 30px; 
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2); 
            max-width: 600px; 
            margin: 80px auto;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        h1 span {
            color: orange;
        }
        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }
        .nav-links a {
            text-decoration: none;
            padding: 12px 20px;
            background-color: #007BFF;
            color: white;
            font-size: 18px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .nav-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <span>Admin!</span></h1>
        <h2>MPK BANKING</h2>
        
        <div class="nav-links">
            <a href="bankdetails.html">Bank Details</a>
            <a href="view_users.php">Users Accounts Details</a>
            <!-- <a href="loan.html">Loan Details (Form)</a> -->
            <a href="admin_loans.php">View All Loan Applications</a>
        </div>
    </div>
</body>
</html>