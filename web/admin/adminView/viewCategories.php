<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Orders</h2>
    <?php
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

    // Retrieve orders data from the database
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Order ID</th>
                    <th>Delivery Address</th>
                    <th>Payment Option</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['order_id'] . "</td>
                    <td>" . $row['delivery_address'] . "</td>
                    <td>" . $row['payment_option'] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No orders found.";
    }

    // Close the result set
    $result->free_result();
    ?>

    <h2>Order Items</h2>
    <?php
    // Retrieve order items data from the database
    $sql = "SELECT * FROM order_items";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Order ID</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Item Quantity</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['order_id'] . "</td>
                    <td>" . $row['item_name'] . "</td>
                    <td>" . $row['item_price'] . "</td>
                    <td>" . $row['item_quantity'] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No order items found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
