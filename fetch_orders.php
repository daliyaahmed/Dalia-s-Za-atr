<?php
// Start the session
session_start();
// Include the database connection
include_once 'db_connection.php';

if (isset($_SESSION['user_id'])) {
    $customerId = $_SESSION['user_id'];
    if(isset($_POST['checkoutButton'])) {
        // Retrieve order details
        $orderDetails = $_POST['orderDetails'];
        // Split order details into individual items
        $items = explode(";", $orderDetails);
        // Remove the last empty item (due to trailing semicolon)
        array_pop($items);
        
        // Loop through each item
        foreach($items as $item) {
            // Split item into item id and quantity
            list($itemId, $quantity) = explode(".", $item);
            
            // Query to insert order into restaurantorders table
            $queryInsert = "INSERT INTO restaurantorders (order_id, Customer_id, product_id, product_quantity) VALUES (?, ?, ?, ?)";
            $stmtInsert = $mysqli->prepare($queryInsert);
            $stmtInsert->bind_param("iiii", $orderId, $customerId, $itemId, $quantity);
            $stmtInsert->execute();
            $stmtInsert->close();

            // Query to delete order from orderdetails table
            $queryDelete = "DELETE FROM orderdetails WHERE Customer_id = ? AND product_id = ?";
            $stmtDelete = $mysqli->prepare($queryDelete);
            $stmtDelete->bind_param("ii", $customerId, $itemId);
            $stmtDelete->execute();
            $stmtDelete->close();
        }
        // Redirect to order history page
        header("Location: /website/orderHistory.html");
    }
} else {
    echo "User not logged in.";
}
$mysqli->close();
?>
