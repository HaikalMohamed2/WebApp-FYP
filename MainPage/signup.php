<?php
session_start();

include("../DBConn.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $staff_id = $_POST['staff_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {
        $status = 'pending'; // Initial status is 'pending'
        $query = "INSERT INTO staffaccount (staff_id, username, email, password, status) 
                  VALUES ('$staff_id', '$username', '$email', '$password', '$status')";
        mysqli_query($conn, $query);

        echo "<script type='text/javascript'> alert('Registration successful. Please wait for admin approval.')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1">
    <title>Register Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="signup">
    <h1>Sign Up</h1>
    <p>Welcome To SSAMS</p>
    <div class="logo">
        <img src="../SourceImg/SEMUJA.png" alt="SSAMS">
    </div>
    <form method="POST">
        <label>Staff ID</label>
        <input type="text" name="staff_id" required>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <input type="submit" name="" value="Submit" >
    </form>
    <p>Already have an account? <a href="LoginPage.php">Login Here</a></p>
</div>
</body>
</html>
