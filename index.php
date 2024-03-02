<?php
    include('db.php');

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="mainpagestyle.css">
  </head>
  <body>
      <ul>
          <li><a href="">Home</a></li>
          <li><a href="">News</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="">About</a></li>
        </ul>
        <h1 class="h1mp">WELCOME TO SSAMS</h1>
        <div class="logo">
            <img src="SEMUJA.png" alt="SSAMS">
        </div>
        <div class="mainpage">
                      <!-- Slideshow container -->
          <div class="slideshow-container">

          <!-- Full-width images with number and caption text -->
          <div class="mySlides fade">
            <img src="sunset1.jpeg" >
          </div>

          <div class="mySlides fade">
            <img src="sunset2.jpg" >
          </div>

          <div class="mySlides fade">
            <img src="sunset3.jpeg">
          </div>
          <div class="btn-group" style="width:100%">
            <button><a href="login.php">Staff Dashboard</a></button>
            <button><a href="">Management Dashboard</a></button>
            <button><a href="">Admin Dashboard</a></button>
          </div>
        </div>
        <script src="mainpage.js"></script>
</body>
</html>