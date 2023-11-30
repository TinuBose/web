<?php
// Create a database connection (replace with your own database credentials)
$conn = new mysqli("localhost", "root", "", "backend");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch menu items from the database
$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<tr><th>Item Name</th><th>Item Price</th><th>Item Photo</th><th>Item Details</th><th>Item Category</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["item_name"] . '</td>';
        echo '<td>' . $row["item_price"] . '</td>';
        echo '<td><img src="' . $row["item_photo"] . '" width="100" height="100"></td>';
        echo '<td>' . $row["item_details"] . '</td>';
        echo '<td>' . $row["item_category"] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "No items found in the menu.";
}

$conn->close();
?>
