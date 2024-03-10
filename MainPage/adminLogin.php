<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the entered credentials are for the admin
    if ($email == "admin123@gmail.com" && $password == "admin123") 
    {
        // Redirect to the admin page
        header("location: ../AdminDashboard.php");
        die;
    } 
    else 
    {
        echo "<script type='text/javascript'> alert('Wrong email or password')</script>";
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
<a href="../MainPage/index.php" class="btn btn-info">Homepage</a>
    <h1>Admin Login</h1>
    <p>Welcome To SSAMS</p>
    <div class="logo">
        <img src="SEMUJA.png" alt="SSAMS">
    </div>
    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
