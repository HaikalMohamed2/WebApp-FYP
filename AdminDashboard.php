<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
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
                    <li><a class="dropdown-item" href="LogoutSession/AdminLogout.php">Log Out</a></li>
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
            <br>
            <h2 class="text-center">Administrator Dashboard</h2><br>
            <!-- Table -->
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-light" id="TablePosition">

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

                <?php include('DBAdmin.php')?>
                <thead align="center">
                <th colspan="6" class="text-bg-dark">LIST OF STAFF ACCOUNTS</th>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Staff ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Email</th>
                </tr>
                <tr>
                    <!-- For Reference -->
                    <!-- <td>A</td>
                    <td>B</td>
                    <td>C</td>
                    <td>D</td> -->
                </tr>
                </thead>
                <!-- <th colspan="6" class="text-bg-secondary">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>

                </th> -->
            </table>
            </div>
            <br>
        </div>
        </div>
    </div>

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