<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
  <!-- Bootstrap for CSS and JS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom CSS and JS-->
  <link href="AboutStyle.css" rel="stylesheet">
  <link href="MyStyle.css" rel="stylesheet">
  <script src="AboutScript.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg NavSet flex-column">
            <div class="container-fluid">
              <!-- Navigation Toggle Button -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
              </button>
 
                <div class="d-flex align-items-center mx-auto d-lg-none">
                    <span class="mx-auto">ABOUT SAMS</span>
                </div>

                <div class="logo">
                    <img src="../SourceImg/SEMUJA.png" alt="SAMS">
                </div>

                <!-- Navigation Toggle -->
                <div class="collapse navbar-collapse" id="navbarNav" method="post">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../MainPage/index.php">Home</a>
                        <li class="nav-item">
                            <a class="nav-link active" href="../AboutPage/About.php">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sections 1-->
    <div class="section section1">
      <h2>About System</h2>
      <br>
      <p>An overview of the staff attendance monitoring system</p>

      <div class="clearfix">
        <div class="container text-center">
            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
              <div class="col">
                <div class="p-3"><img src="../SourceImg/ImgSystem/MainPage-Img.png"></div>
              </div>
              <div class="col">
                <div class="p-3"><img src="../SourceImg/ImgSystem/StaffDasboardPage.png"></div>
              </div>
              <div class="col">
                <div class="p-3"><img src="../SourceImg/ImgSystem/ManagementDashboard.png"></div>
              </div>
              <div class="col">
                <div class="p-3"><img src="../SourceImg/ImgSystem/AdminDashboard.png"></div>
              </div>
            </div>
          </div>
        <p>
        The School Staff Attendance Monitoring System, or SAMS, makes ensuring that staff attendance in educational 
        institutions is accurately tracked. Teachers and other staff members log into the system to track their attendance. 
        Staff members can choose to make up lost time at another specified time if they are not present for the required number of hours. 
        </p>

        <p>
        This feature guarantees that employees complete their required hours and encourages accountability. Sensitive data is protected by robust system security mechanisms. 
        Furthermore, the system exhibits the attendance percentage.
        </p>
      </div>
    </div>

    <!-- Section 2 -->  
    <div class="section section2">
      <h2>About Teams</h2>
      <br>
      <p>We are Polytechnic Muadzam Shah fifth semester students working with SEMUJA on this system as part of a final semester project course.</p>
      <br>
      <div class="card-container">
        <div class="card cardStyle">
          <img src="TeamImg/Suhaili(Leader).png" class="card-img-top" alt="">
          <div class="card-body">
            <p class="card-text">Muhamad Suhaili Aqil Bin Abdul Rahman<br><hr>Leader<hr><b>Role as</b> Project Manager</p>
          </div>
        </div>

        <div class="card cardStyle">
          <img src="TeamImg/Haikal(member1).png" class="card-img-top" alt="">
          <div class="card-body">
            <p class="card-text">Haikal Bin Mohamed<br><hr>Member 1<hr><b>Role as</b> Programmer 1</p>
          </div>
        </div>
        <div class="card cardStyle">
          <img src="" class="card-img-top" alt="">
            <div class="card-body">
              <p class="card-text">Mohamad Fakhrul Haqimi Bin Edris<br><hr>Member 2<hr><b>Role as</b> Programmer 2</p>
            </div>
        </div>
        </div>
      </div>
    </div>


  <!-- Footer -->
  <footer class="FooterStyle">
    <div class="container">
      <span class="text-muted">@SEMUJA SAMS 2024</span>
    </div>
  </footer>
  
</body>
</html>
