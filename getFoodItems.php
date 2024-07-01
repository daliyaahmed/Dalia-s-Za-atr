<?php
// Include the database connection
include_once 'db_connection.php';

// Retrieve food items from the database
$query = "SELECT product_id, product_name, product_availabilityStatus FROM productDetails";
$result = $mysqli->query($query);

// Convert result to associative array
$foodItems = [];
while ($row = $result->fetch_assoc()) {
    $foodItems[] = $row;
}

// Close the database connection
$mysqli->close();

// Send the food items as JSON response
header('Content-Type: application/json');
echo json_encode($foodItems);
?>