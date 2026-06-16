<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     header("Location: loginbanklogin.html");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MPK BANK- Home</title>
  <link rel="stylesheet" href="style1.css" />
  <link rel="icon" href="img/mpk2.jpg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
</head>
<body>
    <div class="logo">
    <a href="index.html"><img src="img/mpk.png" width="140"height="150"></a>
    </div>
    
  <header>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="application.html">Accounts</a></li>
        <li><a href="user_details.php">dashboard</a></li>
        
        <li><a href="loan_form.php">Loans</a></li>
  
       <!-- <li><a href="appli.php">report</a></li>-->
        <li><a href="signupbanksignup.html">Signup</a></li>
        <li><a href="loginbanklogin.html">Login</a></li>
        <li><a href="logout.php" onclick="alert('are you sure to logout')">Logout</a></li>
      </ul>
    </nav>
  </header>
  <section id="love">
    <h1 style="font-size:20px">WELCOME TO MPK BANKING</h1>
    <h2>TRUSTED PARTNER OF YOUR LIFE</h2>
    <hr>
    <marquee behavior="scroll" direction=""> MPK bank never asks for your Card/PIN/OTP/CVV details on phone, message or email. Please do not click on links received on your email or mobile asking your Bank/Card details.
</marquee>
  </section>
  <hr>

  <section class="slider">
    <div class="slides">
      <img src="img/family.webp" class="slide" />
      <img src="img/personal.avif" class="slide" />
      <img src="img/online.jpg" class="slide" />
    </div>
  </section>
  <hr>
  <div class="save">
  <h1>save your life with mpk banking</h1></div>
  <hr>
  <img src="img/mpk banking.png" width="100%" height="650">
  <hr>
  <div class="ser">
    <h1>our services</h1>
  </div>
  <section class="ove">
    <h1>Insurance</h1>
    <ul type="bullets">
  <li>Life insurance</li>
  <br>
  <br>
  <li>Health insurance</li>
  <br>
  <br>
  <li>Vechile insurance</li>
  <br>
  <br>
  <li>Goverment scheme</li></ul></section>
  <section class="ove">
    <h1>Explore the service</h1>
    <ul type="bullets">
    <li><a href="personal.html">personal loan</a>
    <br>
    <br>
    <li><a href="loan.html">Home loans</a>
    <br>
    <br>
   <li><a href="#atm card block">Atm card block</a></li>
  </section>
  <section id="ve">
    <h1>WHAT'S new</h1>
    <ul type="bullets">
    <li><a href="account.html">MPK holidays savings account</a>
      <br>
      <br>
      <li><a href="recharge.html">Moblie recharge</a>
      <br>
      <br>
      <li><a href="#Link adhaar with bank account">Link aadhar with Bank account</a></li>
  </section>
  <section id="ve">
    <h1>Quick links</h1>
    <ul type="bullets">
      <li><a href="#Net banking">Net banking</a></li>
      <br>
      <li><a href="#MPK life insurance">MPK life insurance</a></li>
    </ul>
  </section>
  <hr>
  <div class="faaw">
    <h1>our social media pages</h1>
    <br>
    <br>
    <i class="fa-brands fa-facebook"></i>
    <i class="fa-brands fa-instagram"></i>
    <i class="fa-brands fa-x-twitter"></i>
    
  
  </div>
  <br>
  <br>
  <footer>
    <p>© 2025 MPK BANKING. All rights reserved.</p>
  </footer>

  <script src="script.js">
  </script>
</body>
</html>