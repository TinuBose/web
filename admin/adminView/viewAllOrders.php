<!DOCTYPE html>
<html>
<head>
    <title>View Reservations</title>
</head>
<body>
    <h1>View Reservations</h1>
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'backend');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Query to retrieve reservations
    $sql = "SELECT * FROM reservations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Restaurant Name</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>People</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["user_name"] . "</td>
                <td>" . $row["user_email"] . "</td>
                <td>" . $row["restaurant_name"] . "</td>
                <td>" . $row["phone"] . "</td>
                <td>" . $row["date"] . "</td>
                <td>" . $row["time"] . "</td>
                <td>" . $row["people"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No reservations found.";
    }

    $conn->close();
    ?>
</body>
</html>