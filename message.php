<?php
// Database connection settings
$server = "localhost"; // Your MySQL server address (usually "localhost" for XAMPP)
$username = "root";    // Your MySQL username (default is "root" for XAMPP)
$password = "";        // Your MySQL password (leave empty if there's no password)
$database = "backend"; // Your database name

// Create a database connection
$conn = new mysqli($server, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $name = $_POST['name'];
    $message = $_POST['message'];

    // Insert data into the database
    $sql = "INSERT INTO feedback (name,message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $message);

    if ($stmt->execute()) {
       // Show a JavaScript alert with a success message
       echo "<script>alert('Thanks For Your Feedback');</script>";
        
       // Redirect back to the main page after successful booking
       echo "<script>window.location.href = 'index.php';</script>";
       exit();
    } else {
        // Error occurred while inserting data
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
