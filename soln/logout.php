<?php
    session_start();
    session_destroy(); // Destroy the session to log out the user
    header("Location: ../soln/index.php"); // Redirect to the login page after logout
    exit();
?>
