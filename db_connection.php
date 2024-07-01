<?php
// Database connection parameters
$servername = "127.0.0.1";
$username = "pancake";
$password = "maplesyrup2004";
$dbname = "dalia'sza'atr";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
