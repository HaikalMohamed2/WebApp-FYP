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
            <img src="SourceImg\SEMUJA-Logo.jpg" alt="SSAMS">
        </div>
        <div class="mainpage">
                      <!-- Slideshow container -->
          <div class="slideshow-container">

          <!-- Full-width images with number and caption text -->
          <div class="mySlides fade">
            <img src="SourceImg\sunset1.png" >
          </div>

          <div class="mySlides fade">
            <img src="SourceImg\sunset2.png" >
          </div>

          <div class="mySlides fade">
            <img src="SourceImg\sunset3.png">
          </div>
          <form method="post">
          <div class="btn-group" style="width:100%">
            <button><a href="login.php" name="StaffLogin">Staff Dashboard</a></button>
            <button><a href="" name="ManagementLogin">Management Dashboard</a></button>
            <button><a href="" name="AdminLogin">Admin Dashboard</a></button>
          </div>
        </div>
        <script src="mainpage.js"></script>
          </form>
</body>
</html>