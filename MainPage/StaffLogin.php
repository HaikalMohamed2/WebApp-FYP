<?php
    session_start();
    include('../DBConn.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) 
        {
            $query = "SELECT * FROM staffaccount WHERE email = ? LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) 
            {
                $user_data = $result->fetch_assoc();

                if ($user_data['password'] == $password) 
                {
                    if ($user_data['status'] == 'accepted') 
                    {
                        // Check if the user is allowed to login based on their role
                        if ($user_data['role'] == 'Both' || $user_data['role'] == 'Staff') 
                        {
                            // Redirect to the Staff dashboard
                            header("Location: ../StaffDashboard.php");
                            die;
                        } 
                        else 
                        {
                            // Role not set or invalid, display error message
                            echo "<script>alert('Invalid role.');</script>";
                        }
                    } 
                    elseif ($user_data['status'] == 'pending') 
                    {
                        // Account is pending, display error message
                        echo "<script>alert('Your account is pending approval. Please wait for admin approval.');</script>";
                    } 
                    elseif ($user_data['status'] == 'declined') 
                    {
                        // Account is declined, display error message
                        echo "<script>alert('Your account has been declined by the admin. Please contact support for more information.');</script>";
                    }
                } 
                else 
                {
                    // Incorrect password, display error message
                    echo "<script>alert('Wrong email or password.');</script>";
                }
            } 
            else 
            {
                // User not found, display error message
                echo "<script>alert('Wrong email or password.');</script>";
            }
        } 
        else 
        {
            // Invalid input, display error message
            echo "<script>alert('Wrong email or password.');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap for CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login">
    <a href="../MainPage/index.php" class="btn btn-info">Homepage</a>

    <h1>Login</h1>
    <p>Welcome To SSAMS</p>
    <div class="logo">
        <img src="../SourceImg/SEMUJA.png" alt="SSAMS">
    </div>
    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <input type="submit" name="" value="Submit">
    </form>
    <p>Don't have an account yet? <a href="signup.php">Sign Up here</a></p>
</div>
</body>
</html>
