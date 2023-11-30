<?php
// Start a session to manage user login status
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.html");
    exit;
}

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

// Get the user's email from the session (assuming you have set it during login)
$userEmail = $_SESSION['user_email'];

// Retrieve orders for the user from the "ckt" table
$sql = "SELECT * FROM ckt WHERE user_email = '$userEmail' ORDER BY order_id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
   
<style>
body{
    background-color: aquamarine;
}
</style>

</head>
<body>
    <h1>Order History</h1>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orderId = $row['order_id'];
            $address = $row['address'];
            $paymentOption = $row['payment_option'];

            echo "<h2>Order Details</h2>";
            echo "<p>Order ID: $orderId</p>";
            echo "<p>Shipping Address: $address</p>";
            echo "<p>Payment Option: $paymentOption</p>";

            // Retrieve order items from the "ckt_items" table
            $sql_items = "SELECT * FROM ckt_items WHERE order_id = '$orderId'";
            $result_items = $conn->query($sql_items);

            if ($result_items->num_rows > 0) {
                echo "<h3>Order Items</h3>";
                echo "<ul>";

                while ($item = $result_items->fetch_assoc()) {
                    $itemName = $item['item_name'];
                    $itemPrice = $item['item_price'];
                    $itemQuantity = $item['item_quantity'];
                    $itemTotalPrice = $item['item_total_price'];

                    echo "<li>$itemName - Price: $itemPrice, Quantity: $itemQuantity, Total: $itemTotalPrice</li>";
                }

                echo "</ul>";
            }
        }
    } else {
        echo "<p>No orders found for this user.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

    <!-- Show a success message if set in the URL query string -->
    <?php if (isset($_GET['status']) && $_GET['status'] === 'success') : ?>
        <div class="success">Order placed successfully. Your order ID is: <?php echo $_GET['order_id']; ?></div>
    <?php elseif (isset($_GET['status']) && $_GET['status'] === 'pending') : ?>
        <div class="pending">Your order is pending.</div>
    <?php endif; ?>



</body>
</html>
