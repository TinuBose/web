<?php
    session_start();


    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Encrypt the password using MD5 (for this example)
        $encryptedPassword = md5($password);

        // Database connection and authentication
        $conn = new mysqli('localhost', 'root', '', 'backend');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("SELECT * FROM signup WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $encryptedPassword);
            $stmt->execute();
            $result = $stmt->get_result();
        

            if ($result->num_rows == 1) {
                // Authentication successful
                $_SESSION['user_email'] = $email;
            
                // Retrieve the user's name from the database and store it in the session
                $userData = $result->fetch_assoc();
                $_SESSION['user_name'] = $userData['name']; // Assuming the name column in your database contains the user's name
            
                header("Location: ../index.php");

            }
        }
    }
?>