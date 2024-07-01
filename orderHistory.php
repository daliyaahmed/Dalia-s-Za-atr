<?php
include_once 'db_connection.php';

// Fetch data from restaurantorders table
$sql = "SELECT o.order_id, o.Customer_id, o.product_id, o.product_quantity, p.product_name 
        FROM restaurantorders o 
        INNER JOIN productdetails p ON o.product_id = p.product_id";
$result = $mysqli->query($sql);

// Display the result
if ($result->num_rows > 0) {
    echo "<style>
            table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid #ddd;
            }

            th, td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            .beige-bg {
                background-color: beige;
            }
        </style>";

    echo "<table>";
    echo "<thead><tr><th>Order ID</th><th>Customer ID</th><th>Product Name</th><th>Product Quantity</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr class='beige-bg'>";
        echo "<td>" . $row["order_id"] . "</td>";
        echo "<td>" . $row["Customer_id"] . "</td>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td>" . $row["product_quantity"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "0 results";
}

// Close connection
$mysqli->close();
?>
