<?php
// Database connection configuration
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = "";     // Change this to your MySQL password
$dbname = "backend";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form was submitted
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the provided username and password
    $sql = "SELECT * FROM admin_login WHERE username = 'admin' AND password = 'admin123'"; // Plain text for demonstration

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login, redirect to the admin panel or another page
        header("Location: ../index.php"); // Change this to your admin panel page
        exit();
    } else {
        // Invalid credentials, display an error message
        echo "Invalid username or password.";
    }
}

// Close the database connection
$conn->close();
?>
