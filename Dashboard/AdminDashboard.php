<?php
  session_start();
  if (!isset($_SESSION['Email'])) 
  {
    header('Location: ..\MainPage\AdminLogin.php');
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
  <title>Admin Dashboard</title>
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
                <a class="nav-link active" aria-current="page" href="AdminDashboard.php"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="..\AboutPage\About.html" target="_blank"><i class="bi bi-info-circle"></i> About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="..\LogoutSession\AdminLogout.php"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
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
              <br>
              <h2 class="text-center">Administrator Dashboard</h2><br>
              
              <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">List of Staff Account</button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                      <div class="row justify-content-center">
                        <div class="col-12 col-sm-3 mb-2">
                          <button type="button" class="btn btn-success w-100 p-2" data-bs-toggle="modal"
                            data-bs-target="#AddAccountModal">Add Account</button>
                        </div>
                        <div class="col-12 col-sm-3 mb-2">
                          <button type="button" class="btn btn-primary w-100 p-2" data-bs-toggle="modal"
                            data-bs-target="#UpdateAccountModal">Update Account</button>
                        </div>
                        <div class="col-12 col-sm-3 mb-2">
                          <button type="button" class="btn btn-danger w-100 p-2" data-bs-toggle="modal"
                            data-bs-target="#DeleteAccountModal">Delete Account</button>
                        </div>
                      </div>
              
                      <!-- Table -->
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped table-light table-hover table-sm " id="TablePosition">
                          
                          <!-- Modal (Dialog Box / Popup Window) -->
                          <!-- Add Account -->
                          <div class="modal fade" id="AddAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-2" aria-labelledby="AddAccountModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="AddAccountModalLabel">Add Account</h1>
                                </div>
                                <!-- Modal Body(Dialog Box / Popup Window) -->
                                <div class="modal-body">
                                  <form method="post">
                                    <!-- TextBox -->
                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Staff ID</label>
                                      <input type="text" class="form-control" name="StaffID" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Username</label>
                                      <input type="text" class="form-control" name="StaffUname" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Password</label>
                                      <input type="text" class="form-control" name="StaffPassName" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Email</label>
                                      <input type="text" class="form-control" name="StaffEmail" required>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="">Clear</button>
                                      <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-success" name="Add">Add</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Update Absencese -->
                          <div class="modal fade" id="UpdateAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-2" aria-labelledby="UpdateAccountModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="UpdateAccountModalLabel">Update Account</h1>
                                </div>
                                <!-- Modal Body(Dialog Box / Popup Window) -->
                                <div class="modal-body">
                                  <form method="post">
                                    <!-- TextBox -->
                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Staff ID</label>
                                      <input type="text" class="form-control" name="StaffID" required>
                                    </div>

                                    <center>
                                      <hr class="b-example-divider">
                                      <h3>Update</h3>
                                    </center>
                                    <hr class="b-example-divider">

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Username</label>
                                      <input type="text" class="form-control" name="StaffUname" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Password</label>
                                      <input type="text" class="form-control" name="StaffPassName" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Email</label>
                                      <input type="text" class="form-control" name="StaffEmail" required>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="">Clear</button>
                                      <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-success" name="Update">Update</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Delete Absences -->
                          <div class="modal fade" id="DeleteAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="DeleteAccountModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="DeleteAccountModalLabel">Delete Account</h1>
                                </div>
                                <!-- Modal Body(Dialog Box / Popup Window) -->
                                <div class="modal-body">
                                  <form method="post">
                                    <!-- TextBox -->
                                    <div class="mb-3">
                                      <label for="StaffID" class="form-label">Staff ID</label>
                                      <input type="text" class="form-control" name="StaffID" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Email</label>
                                      <input type="text" class="form-control" name="StaffEmail" required>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="">Clear</button>
                                      <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-success" name="Delete">Delete</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                            <?php
                              include('DashboardConn.php');
                              $totalPages = DbAdminSA($conn);
                            ?>
                            <thead align="center">
                              <th colspan="9" class="text-bg-dark">LIST OF STAFF ACCOUNTS</th>
                              <tr>
                                  <th scope="col">Number</th>
                                  <th scope="col">Staff ID</th>
                                  <th scope="col">Username</th>
                                  <th scope="col">Password</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Role</th>
                                  <th scope="col">Request</th>
                                  <th scope="col">Set Role</th>
                              </tr>
                              <tr>
                              </tr>
                              </thead>
                              <tbody>
                              <!-- This is where the PHP code from DBAdmin.php will be included -->
                              </tbody>
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
                <br>
                
                <!-- Second accordion -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">List of Administrator Account</button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                      <div class="row justify-content-center">
                          <div class="col-12 col-sm-3 mb-2">
                            <button type="button" class="btn btn-success w-100 p-2" data-bs-toggle="modal"
                              data-bs-target="#AddAdminAccountModal">Add Account</button>
                          </div>
                          <div class="col-12 col-sm-3 mb-2">
                            <button type="button" class="btn btn-primary w-100 p-2" data-bs-toggle="modal"
                              data-bs-target="#UpdateAdminAccountModal">Update Account</button>
                          </div>
                          <div class="col-12 col-sm-3 mb-2">
                            <button type="button" class="btn btn-danger w-100 p-2" data-bs-toggle="modal"
                              data-bs-target="#DeleteAdminAccountModal">Delete Account</button>
                          </div>
                        </div>

                        <!-- Table -->
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped table-light table-hover table-sm " id="TablePosition">
                          
                          <!-- Modal (Dialog Box / Popup Window) -->
                          <!-- Add Account -->
                          <div class="modal fade" id="AddAdminAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-2" aria-labelledby="AddAdminAccountModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="AddAdminAccountModalLabel">Add Admin Account</h1>
                                </div>
                                <!-- Modal Body(Dialog Box / Popup Window) -->
                                <div class="modal-body">
                                  <form method="post">
                                    <!-- TextBox -->
                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Admin ID</label>
                                      <input type="text" class="form-control" name="AdminID" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Admin Email</label>
                                      <input type="text" class="form-control" name="AdminEmail" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Admin Password</label>
                                      <input type="text" class="form-control" name="AdminPassword" required>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="">Clear</button>
                                      <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-success" name="AddAdmin">Add</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Update Absencese -->
                          <div class="modal fade" id="UpdateAdminAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-2" aria-labelledby="UpdateAdminAccountModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="UpdateAdminAccountModalLabel">Update Admin Account</h1>
                                </div>
                                <!-- Modal Body(Dialog Box / Popup Window) -->
                                <div class="modal-body">
                                  <form method="post">
                                    <!-- TextBox -->
                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Admin ID</label>
                                      <input type="text" class="form-control" name="AdminID" required>
                                    </div>

                                    <center>
                                      <hr class="b-example-divider">
                                      <h3>Update</h3>
                                    </center>
                                    <hr class="b-example-divider">

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Admin Email</label>
                                      <input type="text" class="form-control" name="AdminEmail" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Admin Password</label>
                                      <input type="text" class="form-control" name="AdminPassword" required>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="">Clear</button>
                                      <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-success" name="UpdateAdmin">Update</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Delete Absences -->
                          <div class="modal fade" id="DeleteAdminAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="DeleteAdminAccountModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="DeleteAdminAccountModalLabel">Delete Admin Account</h1>
                                </div>
                                <!-- Modal Body(Dialog Box / Popup Window) -->
                                <div class="modal-body">
                                  <form method="post">
                                    <!-- TextBox -->
                                    <div class="mb-3">
                                      <label for="StaffID" class="form-label">Admin ID</label>
                                      <input type="text" class="form-control" name="AdminID" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="Name" class="form-label">Admin Email</label>
                                      <input type="text" class="form-control" name="AdminEmail" required>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="">Clear</button>
                                      <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-success" name="DeleteAdmin">Delete</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                            <?php
                              $totalPages1 = DbAdminAA($conn);
                            ?>
                            <thead align="center">
                              <th colspan="9" class="text-bg-dark">LIST OF ADMINISTRATOR ACCOUNTS</th>
                              <tr>
                                <th>Number</th>
                                  <th scope="col">AdminID</th>
                                  <th scope="col">Admin Email</th>
                                  <th scope="col">Admin Password</th>
                              </tr>
                              <tr>
                              </tr>
                              </thead>
                              <tbody>
                              <!-- This is where the PHP code from DBAdmin.php will be included -->
                              </tbody>
                        </table>
                      </div>
                      <br>
                      <!-- Pagination links -->
                      <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center">
                              <?php for ($i = 1; $i <= $totalPages1; $i++) : ?>
                                  <li class="page-item <?php echo $AdminPage == $i ? 'active' : ''; ?>">
                                      <a class="page-link" href="?adminPage=<?php echo $i; ?>"><?php echo $i; ?></a>
                                  </li>
                              <?php endfor; ?>
                          </ul>
                      </nav>

                    </div>
                  </div>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Javascript for search data inside table
      document.getElementById('searchInput').addEventListener('input', function () 
      {
        const searchText = this.value.toLowerCase();
        const rows = document.querySelectorAll('#TablePosition tbody tr');

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