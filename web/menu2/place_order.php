<?php
// Establish a database connection (adjust credentials as needed)
$mysqli = new mysqli("localhost", "root", "", "backend");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve data from the checkout form
$itemName = $_POST['item_name'];
$itemPrice = $_POST['item_price'];
$itemQuantity = $_POST['item_quantity'];
$itemTotalPrice = $_POST['item_total_price'];
$address = $_POST['address'];
$paymentOption = $_POST['payment_option'];

// Insert data into the database
$sql = "INSERT INTO fdord (item_name, item_price, item_quantity, item_total_price, address, payment_option)
        VALUES ('$itemName', $itemPrice, $itemQuantity, $itemTotalPrice, '$address', '$paymentOption')";

if ($mysqli->query($sql) === TRUE) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
