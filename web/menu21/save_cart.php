<?php
// Include database connection code here
$conn = new mysqli("localhost", "root", "", "backend");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve cart data, address, and payment option from the request (assuming it's in JSON format)
    $requestData = json_decode(file_get_contents("php://input"));
    
    $cartData = $requestData->cartData;
    $address = $requestData->address;
    $paymentOption = $requestData->paymentOption;

    // Loop through cart items and insert them into the cart_items table
    foreach ($cartData as $item) {
        $itemName = $item->name;
        $itemPrice = $item->price;
        $itemQuantity = $item->quantity;
        $totalPrice = $itemPrice * $itemQuantity;

        $sql = "INSERT INTO cart_items (item_name, item_price, item_quantity, total_price, address, payment_option) 
                VALUES ('$itemName', $itemPrice, $itemQuantity, $totalPrice, '$address', '$paymentOption')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
