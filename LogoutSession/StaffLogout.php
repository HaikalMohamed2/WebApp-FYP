<?php
    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: ../MainPage/StaffLogin.php");
    exit;
?>
