<?php
include 'db.php';

// Get data
$name = $_POST['name'];
$age = $_POST['age'];
$type = $_POST['loan_type'];
$loan_amount = $_POST['loan_amount'];

$marital = $_POST['marital_status'] ?? NULL;
$employment = $_POST['employment'] ?? NULL;
$property = $_POST['property_value'] ?? NULL;
$car = $_POST['car_price'] ?? NULL;
$course = $_POST['course'] ?? NULL;

$status = "Pending";

$error = "";

// Validation
if ($age < 18) {
    $error = "Must be 18+";
}

if (!$loan_amount || $loan_amount <= 0) {
    $error = "Invalid loan amount";
}

// Personal
if ($type == "personal") {
    if (!$marital) $error = "Select marital status";
    elseif (!$employment) $error = "Select employment";
    elseif ($employment == "unemployed") $error = "Must be employed";
}

// Home
if ($type == "home") {
    if (!$property || $property <= 0) $error = "Invalid property value";
}

// Car
if ($type == "car") {
    if (!$car || $car <= 0) $error = "Invalid car price";
}

// Education
if ($type == "education") {
    if (!$course) $error = "Course required";
}

// Error check
if ($error != "") {
    echo "<h3 style='color:red;'>$error</h3>";
    exit;
}

// Insert
$stmt = $conn->prepare("INSERT INTO loans 
(name, age, loan_type, marital_status, employment, property_value, car_price, course, loan_amount, status) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param(
    "sisssddsss",
    $name,
    $age,
    $type,
    $marital,
    $employment,
    $property,
    $car,
    $course,
    $loan_amount,
    $status
);

if ($stmt->execute()) {
    echo "<h3 style='color:green;'>Loan Applied Successfully! Status: Pending</h3>";
  echo  "<a href='index.php' class='back-btn'>Back to Home</a>";

} else {
    echo "Error: " . $stmt->error;
}
?>