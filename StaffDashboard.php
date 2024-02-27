<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Dashboard</title>
  <!-- Bootstrap for CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="MyStyle.css" rel="stylesheet">
  
</head>
<body class="BodyColor">
<!-- Header -->
<header>
  <nav class="navbar navbar-expand-lg NavFont NavColor">
    <div class="container-fluid" id="navTheme">
      <a href="#" class="navbar-brand"><img src="SourceImg\SEMUJA-Logo.png.jpg" width="20%" height="20%"></a>
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownAccount">
              <li><a class="dropdown-item" href="#">Your Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Log Out</a></li>
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
      <br><h2 class="text-center">Staff Dashboard</h2><br>
      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-light" id="TablePosition">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-3 mb-2">
            <button type="button" class="btn btn-success w-100 p-2" data-bs-toggle="modal" data-bs-target="#AddAttendance">Add Attendance</button>
          </div>
          <div class="col-12 col-sm-3 mb-2">
            <button type="button" class="btn btn-primary w-100 p-2" data-bs-toggle="modal" data-bs-target="#UpdateAttendanceModal">Update Attendance</button>
          </div>
          <div class="col-12 col-sm-3 mb-2">
            <button type="button" class="btn btn-danger w-100 p-2" data-bs-toggle="modal" data-bs-target="#DeleteAttendanceModal">Delete Attendance</button>
          </div>
        </div>

        <!-- Modal (Dialog Box / Popup Window) -->
        <!-- Add Attendance -->
        <div class="modal fade" id="AddAttendance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddAttendanceLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="AddAttendanceLabel">Add Attendance</h1>
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
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="StaffName" required>
                  </div>

                  <!-- Select Class-->
                  <div>
                    <label class="form-label">Class</label>
                    <select class="form-select form-select-md" aria-label="Small select example" name="Class">
                    <option selected>Select Class</option>
                    <li><hr class="dropdown-divider"></li>
                    <option>5 LK</option>
                    <option>ST 4A</option>
                    <option>2 AMANAH</option>
                    <option>2 BESTARI</option>
                  </select>
                  </div>

                  <!-- Date Picker -->
                  <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="Date">
                  </div>
                  
                    <!-- TextBox -->
                    <div class="mb-3">
                      <label for="ReasonAbsence" class="form-label">Reason Absence</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="R-Absence"></textarea>
                    </div>
                  
                  <!-- Upload PDF File -->
                  <div class="mb-3">
                    <label class="form-label">Upload Leave Letter</label>
                      <input class="form-control" type="file" name="LeaveLetterFile">
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
        
        <!-- Update Attendance -->
        <div class="modal fade" id="UpdateAttendanceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateAttendanceModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="UpdateAttendanceLabel">Update Attendance</h1>
              </div>
              <!-- Modal Body(Dialog Box / Popup Window) -->
              <div class="modal-body">
                <form method="post">
                  <!-- TextBox -->
                  <div class="mb-3">
                    <label for="Name" class="form-label">Staff ID</label>
                    <input type="text" class="form-control" name="StaffID" required>
                  </div>
                  
                  <!-- Date Picker -->
                  <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="Date">
                    <center>
                    <hr class="b-example-divider"><h3>Update</h3>
                    </center>
                    <hr class="b-example-divider">
                  </div>
                  
                  <!-- Select Class-->
                  <div>
                    <label class="form-label">Class</label>
                    <select class="form-select form-select-md" aria-label="Small select example" name="Class">
                    <option selected>Select Class</option>
                    <li><hr class="dropdown-divider"></li>
                    <option>5 LK</option>
                    <option>ST 4A</option>
                    <option>2 AMANAH</option>
                    <option>2 BESTARI</option>
                  </select>
                  </div>
                  
                    <!-- TextBox -->
                    <div class="mb-3">
                      <label for="ReasonAbsence" class="form-label">Reason Absence</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="R-Absence"></textarea>
                    </div>
                  
                  <!-- Upload PDF File -->
                  <div class="mb-3">
                    <label class="form-label">Upload Leave Letter</label>
                      <input class="form-control" type="file" name="LeaveLetterFile">
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

        <!-- Delete Attendance -->
        <div class="modal fade" id="DeleteAttendanceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeleteAttendanceModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="DeleteAttendanceModalLabel">Delete Attendance</h1>
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
                    <label for="Date" class="form-label">Date</label>
                    <input type="date" class="form-control" name="Date" required>
                  </div>
                  <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="">Clear</button>
                    <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" name="Delete">Delete</button>
                  </div>
                </form>
                <script>
                  $('#DeleteAttendanceModal').on('show.bs.modal', function (event) 
                  {
                    var button = $(event.relatedTarget);
                    var staffID = button.data('staffid');
                    var date = button.data('date');
                    var modal = $(this);
                    modal.find('.modal-body #StaffID').val(staffID);
                    modal.find('.modal-body #Date').val(date);
                  });
                </script>

              </div>
            </div>
          </div>
        </div>
        
        <?php include('Database.php')?>
          <thead align="center">
            <th colspan="6" class="text-bg-info">SENARAI KETIDAKHADIRAN STAFF DAN GURU</th>
            <tr>
              <th scope="col">Staff ID</th>
              <th scope="col">Name</th>
              <th scope="col">Class</th>
              <th scope="col">Date</th>
              <th scope="col">Reason Absence</th>
              <th scope="col">Substitute Teacher</th>
            </tr>
          </thead>
          <!-- <tbody align="center">

          </tbody> -->
        </table>
      </div>
      <br>
      <!-- Pagination Page -->
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