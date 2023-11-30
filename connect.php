<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is authenticated
    if (!isset($_SESSION['user_email'])) {
        header("Location: ../web/soln/index.html"); // Redirect to the login page if not authenticated
        exit();
    }

    // Get user information from the session
    $userName = $_SESSION['user_name'];
    $userEmail = $_SESSION['user_email'];

    // Get form data
    $restaurantName = $_POST['restaurant_name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];

    // You can now use the user information and form data as needed.
    // For example, you can insert this data into a database or send an email.
    // Replace the following code with your desired functionality.
    
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'backend');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Insert the reservation data into the database
    $stmt = $conn->prepare("INSERT INTO reservations (user_name, user_email, restaurant_name, phone, date, time, people) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $userName, $userEmail, $restaurantName, $phone, $date, $time, $people);
    
    if ($stmt->execute()) {
        echo "Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!";
    } else {
        if ($conn->errno == 1062) { // Error number for duplicate entry
            echo "Error: This reservation already exists. Please try again.";
        } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    }
}
?>