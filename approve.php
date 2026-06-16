<?php
include 'db.php';

$id = $_GET['id'];

$conn->query("UPDATE loans SET status='Approved' WHERE id=$id");

header("Location: admin_loans.php");
?>