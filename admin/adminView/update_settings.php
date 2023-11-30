<?php

$servername = "localhost"; // Replace with your MySQL server hostname
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "backend"; // Replace with your database name

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Database connection setup here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize user input
    $background_color = mysqli_real_escape_string($conn, $_POST['background_color']);
    $background_image = mysqli_real_escape_string($conn, $_POST['background_image']);
    $section_1_content = mysqli_real_escape_string($conn, $_POST['section_1_content']);

    // Update settings in the database
    $update_query = "UPDATE webpage_settings SET setting_value = ? WHERE setting_name = ?";
    $stmt = mysqli_prepare($conn, $update_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $background_color, 'background_color');
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_param($stmt, "ss", $background_image, 'background_image');
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_param($stmt, "ss", $section_1_content, 'section_1_content');
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    // Redirect back to the admin panel
    header("Location: admin.php");
    exit();
}

?>
