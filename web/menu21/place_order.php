<?php
// Retrieve data from the HTML form
$deliveryAddress = $_GET['address'];
$paymentOption = $_GET['payment-option'];
$cartData = json_decode($_GET['cart-data'], true);

// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "backend"; // Replace with your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert order data into the database
$sql = "INSERT INTO orders (delivery_address, payment_option) VALUES ('$deliveryAddress', '$paymentOption')";
if ($conn->query($sql) === TRUE) {
    $orderId = $conn->insert_id;

    // Insert order items into the order_items table
    foreach ($cartData as $item) {
        $itemName = $item['name'];
        $itemPrice = $item['price'];
        $itemQuantity = $item['quantity'];

        $sql = "INSERT INTO order_items (order_id, item_name, item_price, item_quantity)
                VALUES ('$orderId', '$itemName', '$itemPrice', '$itemQuantity')";
        $conn->query($sql);
    }

    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
