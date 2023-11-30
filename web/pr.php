<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h1>Admin Page</h1>
    <p>This is the code for processing reservations:</p>
    <pre>
        <?php
        // Display the PHP code here
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
            $stmt->bind_param("ssssssi", $userName, $userEmail, $restaurantName, $phoneNumber, $date, $time, $people);

            if ($stmt->execute()) {
                // Show a JavaScript alert with a success message
                echo "<script>alert('Booking was successful.');</script>";

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
    </pre>
</body>
</html>