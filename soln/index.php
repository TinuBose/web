<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
</head>
<body>
<?php
    session_start();

    // Define a variable for error message
    $errorMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $encryptedPassword = md5($password);

        $conn = new mysqli('localhost', 'root', '', 'backend');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("SELECT * FROM signup WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $encryptedPassword);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $_SESSION['user_email'] = $email;
                $userData = $result->fetch_assoc();
                $_SESSION['user_name'] = $userData['name'];
                header("Location: ../index.php");
            } else {
                // Set error message if login fails
                $errorMessage = "Invalid email or password";
            }
        }
    }
?>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="signup.php" method="post">
            <!-- Your existing sign-up form -->
            <!-- ... (existing sign-up form HTML) ... -->
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input type="email" placeholder="Email" name="email" required/>
            <input type="password" placeholder="Password" name="password" required/>
            <button>Sign In</button>
            <a href="#">Forgot your password?</a>
			<a href="../admin/login/login.html" class="gotoAdmin">Login as admin</a>
            
            <!-- Error message section -->
            <?php if (!empty($errorMessage)) : ?>
                <span style="color: red;"><?php echo $errorMessage; ?></span>
            <?php endif; ?>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start the journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
