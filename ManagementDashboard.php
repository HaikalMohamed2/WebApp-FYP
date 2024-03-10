<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Management Dashboard</title>
  <!-- Bootstrap for CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="MyStyle.css" rel="stylesheet">
</head>
<body class="BodyColor">
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg NavFont NavColor">
      <div class="container-fluid">
        <a href="#" class="navbar-brand"><img src="SourceImg\SEMUJA-Logo.jpg" width="20%" height="20%"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Help</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownManage" role="button" data-bs-toggle="dropdown" aria-expanded="false">Manage</a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownManage">
                <li><a class="dropdown-item" href="#">Staff Account</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Database</a></li>
              </ul>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownAccount">
                <li><a class="dropdown-item" href="#">Your Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="LogoutSession/MgmtLogout.php">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <div class="container ContentColor">
    <div class="row">
      <div class="col">
        <br><h2 class="text-center">Management Dashboard</h2><br>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-light">

            <?php include('MgmtDB.php')?>
            <thead align="center">
              <tr>
                <th colspan="8" class="text-bg-dark">STAFF AND TEACHER ABSENCE LIST</th>
                <tr>
                  <th scope="col">Staff ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Class</th>
                  <th scope="col">Date</th>
                  <th scope="col">Reason Absence</th>
                  <th scope="col">Substitute Teachers Name</th>
                  <th scope="col">Choose a Substitute <br> Teacher </th>
                  <th scope="col">Update</th>
                </tr>
                <tr>
                  
              </tr>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>

  <!-- Footer -->
  <footer class="footer mt-auto py-3 FooterColor">
    <div class="container">
      <span class="text-muted">@SEMUJA SAMS 2024</span>
    </div>
  </footer>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>