<?php
  session_start();
  if (!isset($_SESSION['email'])) 
  {
    header('Location: ..\MainPage\LoginPage.php');
    exit;
  }

  if (isset($_SESSION['message'])) 
  {
      echo "<script>alert('{$_SESSION['message']}');</script>";
      unset($_SESSION['message']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate Report</title>
  <!-- Bootstrap for CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="MyStyle.css" rel="stylesheet">
</head>
<body class="BodyColor">
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg NavFont NavColor">
      <div class="container-fluid">
        <a href="..\MainPage\index.php" class="navbar-brand"><img src="..\SourceImg\SEMUJA.png" width="20%" height="20%"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="ManagementDashboard.php"><i class="bi bi-house-door"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\AboutPage\About.html" target="_blank"><i class="bi bi-info-circle"></i> About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\LogoutSession\SessionTimer.php"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
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
        <br><h2 class="text-center">Generate Report</h2><br>
        <!-- Month Selector -->
        <div class="row justify-content-center mb-3">
          <div class="col-6 text-center">
            
          </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-light table-hover table-sm" id="TableData">
            <?php include('GenerateDB.php')?>
            <thead align="center">
              <tr>
                <th colspan="8" class="text-bg-dark">STAFF AND TEACHER ABSENCE LIST</th>
                <tr>
                  <th colspan="8">
                    <!-- Search Input -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6">
                            <input class="form-control" id="searchInput" type="text" placeholder="Search...">
                        </div>
                    </div>
                  </th>
                </tr>
                <tr>
                  <th scope="col">Staff ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Class</th>
                  <th scope="col">Date</th>
                  <th scope="col">Reason Absence</th>
                  <th scope="col">Substitute Teachers Name</th>
                </tr>
                <tr>
              </tr>
              </tr>
            </thead>
          </table>
        </div>
        <br>
        <!-- Pagination links -->
          <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                  <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                      <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                          <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                      </li>
                  <?php endfor; ?>
              </ul>
          </nav>


  <br><br><br>

  <!-- Footer -->
  <footer class="FooterStyle">
    <div class="container">
      <span class="text-muted">@SEMUJA SAMS 2024</span>
    </div>
  </footer>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
      // Javascript for search data inside table
      document.getElementById('searchInput').addEventListener('input', function ()
      {
        const searchText = this.value.toLowerCase();
        const rows = document.querySelectorAll('#TableData tbody tr');

        rows.forEach(row =>
        {
            const columns = row.querySelectorAll('td');
            let found = false;

            columns.forEach(column =>
            {
                if (column.textContent.toLowerCase().includes(searchText))
                {
                    found = true;
                }
            });

            if (found)
            {
                row.style.display = '';
            }
            else
            {
                row.style.display = 'none';
            }
        });
    });
  </script>
</body>
</html>
