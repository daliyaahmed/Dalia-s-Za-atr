<?php

// Start the session
session_start();

// Connect to your database here
include_once 'db_connection.php';

if (isset($_SESSION['user_id'])) {
    $customerId = $_SESSION['user_id'];

    if(isset($_POST['cartButton'])) {
        $orderDetails = $_POST['orderDetails'];
        
        // Split order details into individual items
        $items = explode(";", $orderDetails);
        
        // Remove the last empty item (due to trailing semicolon)
        array_pop($items);
        
        // Now, loop through each item
        foreach($items as $item) {
            // Split item into item id and quantity
            list($itemId, $quantity) = explode(".", $item);

            // Query to check the availability status of the item
            $query = "SELECT product_price, product_availabilityStatus FROM productdetails WHERE product_id = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("i", $itemId);
            $stmt->execute();
            $stmt->bind_result($price, $availabilityStatus);
            $stmt->fetch();
            $stmt->close();

            // Check the availability status
            if ($availabilityStatus == 1) {
                // The item is available
                $total_price = $price * $quantity;

                // Check if the item already exists for the customer
                $query = "SELECT order_id FROM orderdetails WHERE Customer_id = ? AND product_id = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("ii", $customerId, $itemId);
                $stmt->execute();
                $stmt->store_result();
        
                if ($stmt->num_rows > 0) {
                    // If the item already exists, update quantity and total price
                    $query = "UPDATE orderdetails SET product_qty = product_qty + ?, total_price = total_price + ? WHERE Customer_id = ? AND product_id = ?";
                    $stmt = $mysqli->prepare($query);
                    // Calculate total price
                    $total_price = $quantity * $price;
                    $stmt->bind_param("ddii", $quantity, $total_price, $customerId, $itemId);
                    $stmt->execute();
                } else {
                    // If the item does not exist, insert it into the orderdetails table
                    $query = "INSERT INTO orderdetails (Customer_id, product_id, product_price, product_qty, total_price) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $mysqli->prepare($query);
                    $stmt->bind_param("iidid", $customerId, $itemId, $price, $quantity, $total_price);
                    $stmt->execute();
                    $stmt->close();
                }
            } else {
                // The item is not available
                echo "Sorry, this item is currently unavailable.";
            }
        }
        header("Location: /website/cartPage.html");
    }
} else {
    echo "User not logged in.";
}

$mysqli->close();

?>