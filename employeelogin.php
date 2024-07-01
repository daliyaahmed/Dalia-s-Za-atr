<?php
session_start();

include_once 'db_connection.php';

// Getting username and password from POST request
$username = $_POST['uname'];
$password = $_POST['psw'];

// Query to check if the provided credentials exist in the customers table
$sql = "SELECT * FROM employees WHERE Employee_Username  = '$username' AND Employee_pass = '$password'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    
    header("Location: employeemainPage.html");
    exit();
} else {
    // If login fails, set an error message in session
    $_SESSION['login_error'] = "Incorrect login details. Please try again.";
    // Redirect back to the login page
    header("Location: employeeLogin.html");
    
}

$mysqli->close();
