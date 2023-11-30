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
    $restaurantName = $_POST['restaurantname'];
    $phoneNumber = $_POST['number'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $people = $_POST['people'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'backend');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Check the current table number
    $result = $conn->query("SELECT MAX(table_number) AS max_table FROM reservations");
    $row = $result->fetch_assoc();
    $maxTableNumber = $row['max_table'];

    if ($maxTableNumber === null) {
        $tableNumber = 1; // If no previous reservations, start with table number 1
    } else {
        $tableNumber = ($maxTableNumber % 20) + 1; // Reset to 1 after every 20 bookings
    }

    // Insert the reservation data into the database with the table number
    $stmt = $conn->prepare("INSERT INTO reservations (user_name, user_email, restaurant_name, phone, date, time, people, table_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssii", $userName, $userEmail, $restaurantName, $phoneNumber, $date, $time, $people, $tableNumber);

    if ($stmt->execute()) {
        // Show a JavaScript alert with a success message including the table number
        echo "<script>alert('Booking was successful. Your table number is: " . $tableNumber . "');</script>";

        // Redirect back to the main page after successful booking
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
