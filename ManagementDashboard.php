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
        <a href="MainPage\index.php" class="navbar-brand"><img src="SourceImg\SEMUJA.png" width="20%" height="20%"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto"> 
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="ManagementDashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AboutPage\About.php" target="_blank">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="LogoutSession/MgmtLogout.php">Sign Out</a>
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
          <table class="table table-bordered table-striped table-light table-hover table-sm" id="TableData">

            <?php include('MgmtDB.php')?>
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
                  <th scope="col">Choose a Substitute <br> Teacher </th>
                  <th scope="col">Update</th>
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