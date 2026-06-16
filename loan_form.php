<!DOCTYPE html>
<html>
<head>
    <title>Loan Application</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f4f4f9; padding:30px;">

<div style="max-width:600px; margin:auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 15px rgba(0,0,0,0.1);">
    <h2 style="text-align:center; color:#333;">Loan Application</h2>

    <form method="POST" action="loan_process.php">

        <!-- Name -->
        <label>Name:</label><br>
        <input type="text" name="name" required style="width:100%; padding:8px; margin:5px 0 15px; border:1px solid #ccc; border-radius:4px;"><br>

        <!-- Age -->
        <label>Age:</label><br>
        <input type="number" name="age" required style="width:100%; padding:8px; margin:5px 0 15px; border:1px solid #ccc; border-radius:4px;"><br>

        <!-- Loan Type -->
        <label>Loan Type:</label><br>
        <select name="loan_type" id="loanType" required onchange="showFields()" style="width:100%; padding:8px; margin:5px 0 15px; border:1px solid #ccc; border-radius:4px;">
            <option value="">Select</option>
            <option value="personal">Personal</option>
            <option value="home">Home</option>
            <option value="car">Car</option>
            <option value="education">Education</option>
        </select><br>

        <!-- Loan Amount -->
        <label>Loan Amount:</label><br>
        <input type="number" name="loan_amount" required style="width:100%; padding:8px; margin:5px 0 15px; border:1px solid #ccc; border-radius:4px;"><br>

        <!-- Personal -->
        <div id="personal" style="display:none;">
            <label>Marital Status:</label><br>
            <select name="marital_status" style="width:100%; padding:8px; margin:5px 0 15px; border:1px solid #ccc; border-radius:4px;">
                <option value="">Select</option>
                <option value="married">Married</option>
                <option value="unmarried">Unmarried</option>
            </select><br>

            <label>Employment:</label><br>
            <select name="employment" style="width:100%; padding:8px; margin:5px 0 15px; border:1px solid #ccc; border-radius:4px;">
                <option value="">Select</option>
                <option value="employed">Employed</option>
                <option value="unemployed">Unemployed</option>
            </select><br>
        </div>

        <!-- Home -->
        <div id="home" style="display:none;">
            <label>Property Value:</label><br>
            <input type="number" name="property_value" style="width:100%; padding:8px; margin:5px 0 15px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>

        <!-- Car -->
        <div id="car" style="display:none;">
            <label>Car Price:</label><br>
            <input type="number" name="car_price" style="width:100%; padding:8px; margin:5px 0 15px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>

        <!-- Education -->
        <div id="education" style="display:none;">
            <label>Course:</label><br>
            <input type="text" name="course" style="width:100%; padding:8px; margin:5px 0 15px; border:1px solid #ccc; border-radius:4px;"><br>
        </div>

        <button type="submit" style="width:100%; padding:10px; background:#28A745; color:white; border:none; border-radius:5px; font-size:16px; cursor:pointer;">Apply</button>
    </form>

    <!-- Back Button -->
    <a href="index.php" style="display:block; text-align:center; margin-top:20px; padding:10px; background:#007BFF; color:white; text-decoration:none; border-radius:5px;">Back to Home</a>
</div>

<script>
function showFields() {
    var type = document.getElementById("loanType").value;
    document.getElementById("personal").style.display = "none";
    document.getElementById("home").style.display = "none";
    document.getElementById("car").style.display = "none";
    document.getElementById("education").style.display = "none";

    if(type === "personal") document.getElementById("personal").style.display = "block";
    if(type === "home") document.getElementById("home").style.display = "block";
    if(type === "car") document.getElementById("car").style.display = "block";
    if(type === "education") document.getElementById("education").style.display = "block";
}
</script>

</body>
</html>