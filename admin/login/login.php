<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Your database connection credentials
    $servername = "localhost";
    $db_username = "root"; // Change this to your MySQL username
    $db_password = "";     // Change this to your MySQL password
    $dbname = "backend";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform login authentication
    $sql = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful
        $_SESSION['admin_username'] = $username;
        header("Location: ../index.php"); // Redirect to the admin dashboard upon successful login
        exit();
    } else {
        // Authentication failed - display error message
        $error_message = "Invalid username or password";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Login</h1>
            <input type="text" placeholder="Username" name="name" required/>
            <input type="password" placeholder="Password" name="password" required/>
            <button type="submit" name="login">LOGIN</button>
            <?php if (isset($error_message)) : ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </form>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
