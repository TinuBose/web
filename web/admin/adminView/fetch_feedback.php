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

// Fetch feedback data from the 'feedback' table excluding the 'id' column
$sql = "SELECT name, message FROM feedback"; // Exclude 'id' column
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display feedback data in a table
    echo "<table border='1'>";
    echo "<tr><th>name</th><th>Message</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No feedback data found.";
}

// Close the database connection
$conn->close();
?>
