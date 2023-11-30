<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['user_email'])) {
    header("Location: ../web/soln/index.html"); // Redirect to the login page if not authenticated
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'backend');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get the user's email from the session
$userEmail = $_SESSION['user_email'];

// Retrieve the user's latest booking
$query = "SELECT reservation_id, restaurant_name, table_number FROM reservations WHERE user_email = ? ORDER BY reservation_id DESC LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($reservationId, $restaurantName, $tableNumber);
    $stmt->fetch();
    
    // Display the booking details
    echo "<h1>Your Latest Booking</h1>";
    echo "<p>Reservation ID: $reservationId</p>";
    echo "<p>Hotel Name: $restaurantName</p>";
    echo "<p>Table Number: $tableNumber</p>";
    echo "<p>Email: $userEmail</p>";
} else {
    echo "<p>You have no bookings.</p>";
}

$stmt->close();
$conn->close();
?>
