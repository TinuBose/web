<?php
// Database connection parameters
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'backend';

// Create a database connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$orderId = 0;

// Retrieve data from checkout.html
$address = $_POST['address'];
$paymentOption = $_POST['payment-option'];

// Insert data into the orders table
$sql = "INSERT INTO orders (address, payment_option) VALUES ('$address', '$paymentOption')";
if ($conn->query($sql) === TRUE) {
    $orderId = $conn->insert_id;

    // Retrieve the cart data from localStorage (assuming you store it in a JSON format)
    $cartData = json_decode($_POST['cart-data'], true);

    // Insert cart items into the order_items table
    foreach ($cartData as $item) {
        $itemName = $item['name'];
        $itemPrice = $item['price'];
        $itemQuantity = $item['quantity'];
        $itemTotalPrice = $item['quantity'] * $item['price'];

        // Insert item into order_items table with the corresponding order_id
        $sql = "INSERT INTO order_items (order_id, item_name, item_price, item_quantity, item_total_price) VALUES ('$orderId', '$itemName', '$itemPrice', '$itemQuantity', '$itemTotalPrice')";
        $conn->query($sql);
    }

    // Close the database connection
    $conn->close();

 
    $successMessage = "Order placed successfully. Your order ID is: " . $orderId;
} else {
    $successMessage = "Error: " . $sql . "<br>" . $conn->error;
}

// Redirect to cart.html and clear the cart
echo '<script>alert("' . $successMessage . '"); window.location.href = "cart.html"; localStorage.removeItem("cart");</script>';
?>
