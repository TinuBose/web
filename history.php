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
    
    // Display the booking details in a styled table with a home button
    echo "<html>";
    echo "<head>";
    echo "<style>";
    echo "body {";
    echo "    font-family: Arial, sans-serif;";
    echo "    background-color: #D2B48C;";
    echo "    display: flex;";
    echo "    flex-direction: column;";
    echo "    align-items: center;";
    echo "    justify-content: center;";
    echo "    height: 100vh;";
    echo "}";
    echo "table {";
    echo "    border-collapse: collapse;";
    echo "    width: 60%;";
    echo "}";
    echo "th, td {";
    echo "    border: 3px solid #000000;";
    echo "    padding: 12px;";
    echo "    text-align: left;";
    echo "}";
    echo "th {";
    echo "    background-color: #FFFAFA;";
    echo "}";
    echo ".home-button {";
    echo "    position: absolute;";
    echo "    top: 20px;";
    echo "    right: 20px;";
    echo "    padding: 10px 20px;";
    echo "    background-color: #007BFF;";
    echo "    color: white;";
    echo "    text-decoration: none;";
    echo "}";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    
    // Home button linking to the homepage
    echo "<a class='home-button' href='index.php'>Home</a>";

    echo "<h1>Your Latest Booking</h1>";
    echo "<table>";
    echo "<tr><th>Reservation ID</th><th>Hotel Name</th><th>Table Number</th><th>Email</th></tr>";
    echo "<tr>";
    echo "<td>$reservationId</td>";
    echo "<td>$restaurantName</td>";
    echo "<td>$tableNumber</td>";
    echo "<td>$userEmail</td>";
    echo "</tr>";
    echo "</table>";
    
    echo "</body>";
    echo "</html>";
} else {
    echo "<p>You have no bookings.</p>";
}

$stmt->close();
$conn->close();
?>
