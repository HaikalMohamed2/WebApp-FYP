<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- Bootstrap for CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="MyStyle.css" rel="stylesheet">
  
</head>
<body>
<!-- Header -->
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light NavFont">
    <div class="container-fluid">
      <a href="#" class="navbar-brand"><img src="SourceImg\SEMUJA-Logo.png.jpg" width="20%" height="20%"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownManage" role="button" data-bs-toggle="dropdown" aria-expanded="false">Attendance</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownManage">
              <li><a class="dropdown-item" href="#">Add Attendance</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">List Attendance</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownAccount">
              <li><a class="dropdown-item" href="#">Your Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Log Out</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <br><h2 class="text-center">Staff Dashboard</h2><br>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-light" id="TablePosition">
          
        <p class="text-bg-info p-2" align="center"><b>SENARAI KETIDAKHADIRAN STAFF DAN GURU</b></p>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Attendance</button>
        <hr>

        <!-- Modal (Dialog Box / Popup Window) -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Attendance</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <!-- Modal Body(Dialog Box / Popup Window) -->
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="mb-3">
                    <label for="Class" class="form-label">Class</label>
                    <!-- Dropdown List -->
                  </div>
                  <div class="mb-3">
                    <label for="DatePicker" class="form-label">Date</label>
                    <!-- Date Picker -->
                  </div>
                  <div class="mb-3">
                    <label for="ReasonAbsence" class="form-label">Reason Absence</label>
                    <!-- TextBox -->
                  </div>
                  <div class="mb-3">
                    <label for="ReasonAbsence" class="form-label">Upload Leave Letter</label>
                    <!-- Upload PDF File -->
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Save</button>
              </div>
            </div>
          </div>
        </div>
        
        <?php include('Database.php')?>
          <thead align="center">
            <tr>
              <th scope="col">Staff ID</th>
              <th scope="col">Name</th>
              <th scope="col">Class</th>
              <th scope="col">Date</th>
              <th scope="col">Reason Absence</th>
            </tr>
          </thead>
          <tbody align="center">

          </tbody>
        </table>
        <nav aria-label="">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="footer mt-auto py-3 bg-light" style="text-align: center;">
  <div class="container">
    <span class="text-muted">@SEMUJA SAMS 2024</span>
  </div>
</footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>