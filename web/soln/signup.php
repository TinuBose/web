<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Encrypt the password using MD5 (for this example)
    $encryptedPassword = md5($password);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'backend');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO signup (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $encryptedPassword);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        // Redirect to the login page after successful registration
        echo"<script>alert('Sign up Successful')</script>";
        header("Location: ../soln/index.html");
        exit();
    }
?>


