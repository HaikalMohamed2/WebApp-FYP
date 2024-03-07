<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $staff_id = $_POST['staff_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query = "insert into account (staff_id, username, email, password) values('$staff_id', '$username', '$email', '$password')";

            mysqli_query($conn, $query);

            echo " <script type='text/javascript'> alert('Register Succesfull')</script>";
        }
        else
        {
            echo " <script type='text/javascript'> alert('Please Enter Some Valid Information')</script>";


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
                <img src="SourceImg\SEMUJA-Logo.jpg" alt="SSAMS">
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
                <input type="submit" name="" value="Submit">
            </form>
            <p>Already have an account? <a href="login.php">Login Here</a></p>
        </div>
  </body>
</html>