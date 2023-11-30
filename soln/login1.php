<?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Encrypt the password using MD5
        $encryptedPassword = md5($password);

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'backend');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        } else {
            // Check if the user exists in the database
            $stmt = $conn->prepare("SELECT * FROM signup WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $encryptedPassword);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                echo "Login successful!";
            } else {
                echo "Login failed. Please check your credentials.";
            }

            $stmt->close();
            $conn->close();
        }
    }
?>
