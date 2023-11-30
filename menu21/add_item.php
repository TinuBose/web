<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];
    $item_details = $_POST["item_details"];
    $item_category = $_POST["item_category"];

    // Upload item photo
    $target_dir = "menu_images/";
    $target_file = $target_dir . basename($_FILES["item_photo"]["name"]);

    if (move_uploaded_file($_FILES["item_photo"]["tmp_name"], $target_file)) {
        // Create a database connection (replace with your own database credentials)
        $conn = new mysqli("localhost", "root", "", "backend");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert the new menu item into the database
        $sql = "INSERT INTO menu_items (item_name, item_price, item_photo, item_details, item_category) 
                VALUES ('$item_name', $item_price, '$target_file', '$item_details', '$item_category')";

        if ($conn->query($sql) === TRUE) {
            echo"<script>alert('added Successful')</script>";
            header("Location: ../admin/index.php#productsizes");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error uploading file.";
    }
}
?>
