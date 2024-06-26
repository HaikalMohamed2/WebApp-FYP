<?php
    session_start();
    include('../DBConn.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $res = $conn->query("SELECT AdminPass FROM adminaccount WHERE AdminEmail = '$email'");
        $HashPass = $res->fetch_assoc()['AdminPass'];

        // Check if the entered credentials are for the admin
        if (!empty($email) && !empty($password) && !is_numeric($email)) 
        {
            $query = "SELECT * FROM adminaccount WHERE AdminEmail = ? LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) 
                {
                    $user_data = $result->fetch_assoc();

                    if (password_verify($password, $HashPass)) 
                    {
                        // Set the session variable
                        $_SESSION['Email'] = $email;

                        // Successful login, store success message in session
                        $_SESSION['message'] = 'Login successful.';
                        header('location: ..\Dashboard\AdminDashboard.php');
                        exit;
                    } 
                    else 
                    {
                        // Incorrect password, display error message
                    echo "<script>alert('Wrong email or password.');</script>";
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
            // Incorrect password, display error message
            echo "<script>alert('Wrong email or password.');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <!-- Bootstrap for CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login">
<a href="../index.php" class="btn btn-info">Homepage</a>
    <h1>Admin Login</h1>
    <p>Welcome To SSAMS</p>
    <div class="logo">
        <img src="../SourceImg/SEMUJA.png" alt="SSAMS">
    </div>
    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <input type="submit" value="LOGIN">
    </form>
</div>
</body>
</html>
