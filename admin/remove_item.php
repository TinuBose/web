<?php
if (isset($_GET["item_id"])) {
    // Get the item ID from the URL
    $item_id = $_GET["item_id"];

    // Create a database connection (replace with your own database credentials)
    $conn = new mysqli("localhost", "root", "", "backend");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to remove the item by ID
    function removeItem($conn, $item_id) {
        $sql = "DELETE FROM menu_items WHERE id = $item_id";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Item removed successfully')</script>";
            echo "<script>window.location.href='index.php';</script>"; // Redirect using JavaScript
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Call the removeItem function to delete the item
    removeItem($conn, $item_id);

    $conn->close();
} else {
    // Redirect to the admin page if no item ID is provided
    header("Location: index.php");
    exit();
}
?>
