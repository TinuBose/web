<?php
// Create a database connection (replace with your own database credentials)
$conn = new mysqli("localhost", "root", "", "backend");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to remove an item by its ID
function removeItem($conn, $item_id) {
    $sql = "DELETE FROM menu_items WHERE id = $item_id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Item removed successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Query to retrieve menu items from the database
$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h1>Admin Page</h1>
    
    <table border="1">
        <tr>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Item Details</th>
            <th>Item Category</th>
            <th>Item Photo</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["item_name"] . "</td>";
                echo "<td>" . $row["item_price"] . "</td>";
                echo "<td>" . $row["item_details"] . "</td>";
                echo "<td>" . $row["item_category"] . "</td>";
                echo "<td><img src='" . $row["item_photo"] . "' width='100'></td>";
                echo "<td><a href='javascript:void(0);' onclick='removeItem(" . $row["id"] . ");'>Remove</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No items available.</td></tr>";
        }
        ?>
    </table>

    <script>
        // JavaScript function to confirm item removal
        function removeItem(itemId) {
            if (confirm("Are you sure you want to remove this item?")) {
                window.location.href = "remove_item.php?item_id=" + itemId;
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>