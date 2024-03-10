<?php
    session_start();
    include('../DBConn.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $email = $_POST['email'];
      $password = $_POST['password'];

      if(!empty($email) && !empty($password) && !is_numeric($email))
      {
          $query = "select * from staffaccount where email = '$email' limit 1";
          $result = mysqli_query($conn, $query);

          if($result)
          {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result); 

                if($user_data['password'] == $password)
                {
                    header("location: ../ManagementDashboard.php");
                    die;
                }
            }
          }
          echo " <script type='text/javascript'> alert('wrong email or password')</script>";
      }
      else
      {
        echo " <script type='text/javascript'> alert('wrong email or password')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1">
    <title>Management Login Form</title>
    <!-- Bootstrap for CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="login">
    <a href="../MainPage/index.php" class="btn btn-info">Homepage</a>
        <h1>Management <br> Login</h1>
        <p>Welcome To SSAMS</p>
        <div class="logo">
            <img src="SEMUJA.png" alt="SSAMS">
        </div>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>Don't have account yet? <a href="signup.php">Sign Up here</a></p>
  </body>
  </html>