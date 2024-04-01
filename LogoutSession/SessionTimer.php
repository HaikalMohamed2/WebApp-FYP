<?php

    /* This SessionTimer.php is for StaffLogout and ManagementLogout button to end the session 
        and set the expire cookies for each page*/
        
    // Start the session
    session_start();

    // Unset all of the session variables
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie
    if (ini_get("session.use_cookies")) 
    {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 600,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: ../MainPage/LoginPage.php");
    exit;
?>
