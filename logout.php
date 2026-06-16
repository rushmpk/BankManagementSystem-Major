<?php
session_start();
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session
header("Location: loginbanklogin.html"); // Redirect to login page
exit();
?>