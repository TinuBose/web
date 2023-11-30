<!DOCTYPE html>
<html>
<head>
    <title>View Customers</title>
</head>
<body>
    <h1>View Customers</h1>
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'backend');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Query to retrieve customer data
    $sql = "SELECT * FROM signup";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No customers found.";
    }

    $conn->close();
    ?>
</body>
</html>