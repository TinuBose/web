<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #D2B48C;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center content horizontally */
            justify-content: center; /* Center content vertically */
        }

        /* Style for the order items table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Style for the order items list */
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        /* Style for the home button */
        #home-button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        #home-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<a id="home-button" href="index.php">Home</a> <!-- Add a link to your home page -->

<h1>Order Summary</h1>

<table>
    <tr>
        <th>Order ID</th>
        <th>Shipping Address</th>
        <th>Payment Option</th>
       
         <!-- Add a new column -->
        <th>Order Items</th>
        <th>Total Amount</th> <!-- Add a missing closing tag -->
    </tr>

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
    $sql = "SELECT * FROM orders WHERE user_email = '$userEmail' ORDER BY order_id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orderId = $row['order_id'];
            $address = $row['address'];
            $paymentOption = $row['payment_option'];

            // Retrieve order items from the "ckt_items" table
            $sql_items = "SELECT * FROM order_items WHERE order_id = '$orderId'";
            $result_items = $conn->query($sql_items);

            $totalPriceSum = 0; // Initialize the sum of total prices for each order

            if ($result_items->num_rows > 0) {
                echo "<tr>";
                echo "<td>$orderId</td>";
                echo "<td>$address</td>";
                echo "<td>$paymentOption</td>";
               
                echo "<td>";

                echo "<ul>";

                while ($item = $result_items->fetch_assoc()) {
                    $itemName = $item['item_name'];
                    $itemPrice = $item['item_price'];
                    $itemQuantity = $item['item_quantity'];
                    $itemTotalPrice = $item['item_total_price'];

                    echo "<li>$itemName - $itemQuantity x ₹$itemPrice = ₹$itemTotalPrice</li>";

                    // Accumulate the total price for the current order
                    $totalPriceSum += $itemTotalPrice;
                }

                echo "</ul>";
                echo "</td>";

                // Update the total price and sum of total prices columns
               
                echo "<td>₹" . number_format($totalPriceSum, 2) . "</td>";

                echo "</tr>";
            }
        }
    } else {
        echo "<tr><td colspan='6'>No orders found for this user.</td></tr>";
    }

    // Close the database connection
    $conn->close();
    ?>
</table>

<!-- ... (remaining code) ... -->
</body>
</html>
