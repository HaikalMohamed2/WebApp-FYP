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
          <a href="#" class="navbar-brand"><img src="SourceImg\SEMUJA-Logo.jpg" width="20%" height="20%"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav" method="post">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAccount" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownAccount">
                  <li><a class="dropdown-item" href="#">Your Profile</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="LogoutSession/StaffLogout.php">Log Out</a></li>
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
          <h2 class="text-center">Staff Dashboard</h2><br>
          <!-- Table -->
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-light" id="TablePosition">
              <div class="row justify-content-center">
                <div class="col-12 col-sm-3 mb-2">
                  <button type="button" class="btn btn-success w-100 p-2" data-bs-toggle="modal"
                    data-bs-target="#AddAbsencesModal">Add Absences</button>
                </div>
                <div class="col-12 col-sm-3 mb-2">
                  <button type="button" class="btn btn-primary w-100 p-2" data-bs-toggle="modal"
                    data-bs-target="#UpdateAbsencesModal">Update Absences</button>
                </div>
                <div class="col-12 col-sm-3 mb-2">
                  <button type="button" class="btn btn-danger w-100 p-2" data-bs-toggle="modal"
                    data-bs-target="#DeleteAbsencesModal">Delete Absences</button>
                </div>
              </div>

              <!-- Modal (Dialog Box / Popup Window) -->
              <!-- Add Absences -->
              <div class="modal fade" id="AddAbsencesModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-2" aria-labelledby="AddAbsencesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="AddAbsencesModalLabel">Add Absences</h1>
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
                          <div class="select-wrapper">
                            <select class="form-select custom-select" size="5" name="Class">
                              <option>Select Class</option>
                              <hr class="dropdown-divider">
                              <optgroup label="Form 1" align="center"></optgroup>
                              <option>1 Amanah</option>]
                              <option>1 Bestari</option>
                              <option>1 Cekal</option>
                              <option>1 Dedikasi</option>
                              <option>1 Empati</option>
                              <hr class="dropdown-divider">

                              <optgroup label="Form 2" align="center"></optgroup>
                              <hr class="dropdown-divider">
                              <option>2 Amanah</option>]
                              <option>2 Bestari</option>
                              <option>2 Cekal</option>
                              <option>2 Dedikasi</option>
                              <option>2 Empati</option>
                              <hr class="dropdown-divider">

                              <optgroup label="Form 3" align="center"></optgroup>
                              <hr class="dropdown-divider">
                              <option>3 Amanah</option>]
                              <option>3 Bestari</option>
                              <option>3 Cekal</option>
                              <option>3 Dedikasi</option>
                              <option>3 Empati</option>
                              <hr class="dropdown-divider">

                              <optgroup label="Form 4" align="center"></optgroup>
                              <hr class="dropdown-divider">
                              <option>4 Amanah</option>]
                              <option>4 Bestari</option>
                              <option>4 Cekal</option>
                              <option>4 Dedikasi</option>
                              <option>4 Empati</option>
                              <hr class="dropdown-divider">

                              <optgroup label="Form 5" align="center"></optgroup>
                              <hr class="dropdown-divider">
                              <option>5 Amanah</option>]
                              <option>5 Bestari</option>
                              <option>5 Cekal</option>
                              <option>5 Dedikasi</option>
                              <option>5 Empati</option>
                            </select>
                          </div>
                        </div>
                        <br>

                        <!-- Date Picker -->
                        <div class="mb-3">
                          <label class="form-label">Date</label>
                          <input type="date" class="form-control" name="Date">
                        </div>

                        <!-- TextBox -->
                        <div class="mb-3">
                          <label class="form-label">Reason Absence</label>
                          <select class="form-select form-select-md" aria-label="Small select example" name="R-Absence"
                            id="absenceReasonAdd">
                            <option selected>Type of Absence</option>
                            <hr class="dropdown-divider">
                            <option>Cuti Rehat Khas</option>
                            <option>Cuti Sakit</option>
                            <option>Cuti Menunaikan Haji</option>
                            <option>Cuti Mengambil Peperiksaan</option>
                            <option>Cuti Bersalin</option>
                            <option>Cuti Tanpa Rekod PJJ</option>
                            <option>Cuti Aktiviti KPPK/NUTP/Koperasi</option>
                            <option>Cuti Isteri Bersalin</option>
                            <option>Cuti Kematian Ahli Keluarga</option>
                            <option>Other</option>
                          </select>
                        </div>
                        <!-- When Other option is selected, Text Area is displayed -->
                        <div class="mb-3" id="otherReasonTextareaAdd" style="display: none;">
                          <label class="form-label">Other Reason</label>
                          <textarea class="form-control" id="otherReasonAdd" rows="3" name="OtherReason"></textarea>
                        </div>

                        <!-- Upload PDF File -->
                        <!-- <div class="mb-3">
                          <label class="form-label">Upload Leave Letter</label>
                          <input class="form-control" type="file" name="LeaveLetterFile">
                        </div> -->

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
              <div class="modal fade" id="UpdateAbsencesModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-2" aria-labelledby="UpdateAbsencesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="UpdateAbsencesModalLabel">Update
                        Absences</h1>
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
                        </div>

                        <center>
                          <hr class="b-example-divider">
                          <h3>Update</h3>
                        </center>
                        <hr class="b-example-divider">

                        <!-- Select Class-->
                        <div>
                          <label class="form-label">Class</label>
                          <div class="select-wrapper">
                            <select class="form-select custom-select" size="5" name="Class">
                              <option>Select Class</option>
                              <hr class="dropdown-divider">
                              <optgroup label="Form 1" align="center"></optgroup>
                              <option>1 Amanah</option>]
                              <option>1 Bestari</option>
                              <option>1 Cekal</option>
                              <option>1 Dedikasi</option>
                              <option>1 Empati</option>
                              <hr class="dropdown-divider">

                              <optgroup label="Form 2" align="center"></optgroup>
                              <hr class="dropdown-divider">
                              <option>2 Amanah</option>]
                              <option>2 Bestari</option>
                              <option>2 Cekal</option>
                              <option>2 Dedikasi</option>
                              <option>2 Empati</option>
                              <hr class="dropdown-divider">

                              <optgroup label="Form 3" align="center"></optgroup>
                              <hr class="dropdown-divider">
                              <option>3 Amanah</option>]
                              <option>3 Bestari</option>
                              <option>3 Cekal</option>
                              <option>3 Dedikasi</option>
                              <option>3 Empati</option>
                              <hr class="dropdown-divider">

                              <optgroup label="Form 4" align="center"></optgroup>
                              <hr class="dropdown-divider">
                              <option>4 Amanah</option>]
                              <option>4 Bestari</option>
                              <option>4 Cekal</option>
                              <option>4 Dedikasi</option>
                              <option>4 Empati</option>
                              <hr class="dropdown-divider">

                              <optgroup label="Form 5" align="center"></optgroup>
                              <hr class="dropdown-divider">
                              <option>5 Amanah</option>]
                              <option>5 Bestari</option>
                              <option>5 Cekal</option>
                              <option>5 Dedikasi</option>
                              <option>5 Empati</option>
                            </select>
                          </div>
                        </div>
                        <br>

                        <!-- TextBox -->
                        <div class="mb-3">
                          <label class="form-label">Reason Absence</label>
                          <select class="form-select form-select-md" aria-label="Small select example" name="R-Absence"
                            id="absenceReasonUpdate">
                            <option selected>Type of Absence</option>
                            <hr class="dropdown-divider">
                            <option>Cuti Rehat Khas</option>
                            <option>Cuti Sakit</option>
                            <option>Cuti Menunaikan Haji</option>
                            <option>Cuti Mengambil Peperiksaan</option>
                            <option>Cuti Bersalin</option>
                            <option>Cuti Tanpa Rekod PJJ</option>
                            <option>Cuti Aktiviti KPPK/NUTP/Koperasi</option>
                            <option>Cuti Isteri Bersalin</option>
                            <option>Cuti Kematian Ahli Keluarga</option>
                            <option>Other</option>
                          </select>
                        </div>
                        <!-- When Other option is selected, Text Area is displayed -->
                        <div class="mb-3" id="otherReasonTextareaUpdate" style="display: none;">
                          <label class="form-label">Other Reason</label>
                          <textarea class="form-control" id="otherReasonUpdate" rows="3" name="OtherReason"></textarea>
                        </div>

                        <!-- Upload PDF File -->
                        <!-- <div class="mb-3">
                          <label class="form-label">Upload Leave Letter</label>
                          <input class="form-control" type="file" name="LeaveLetterFile">
                        </div> -->

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
              <div class="modal fade" id="DeleteAbsencesModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="DeleteAbsencesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="DeleteAbsencesModalLabel">Delete
                        Absences</h1>
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
                    </div>
                  </div>
                </div>
              </div>

              <?php include('DBStaff.php') ?>
              <thead align="center">
                <th colspan="6" class="text-bg-dark">STAFF AND TEACHER ABSENCE LIST</th>
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
    <script>
      document.getElementById('absenceReasonAdd').addEventListener('change', function () 
      {
        var otherReasonTextareaAdd = document.getElementById('otherReasonTextareaAdd');
        if (this.value === 'Other') 
        {
          otherReasonTextareaAdd.style.display = 'block';
        }
        else 
        {
          otherReasonTextareaAdd.style.display = 'none';
        }
      });

      document.getElementById('absenceReasonUpdate').addEventListener('change', function () 
      {
        var otherReasonTextareaUpdate = document.getElementById('otherReasonTextareaUpdate');
        if (this.value === 'Other') 
        {
          otherReasonTextareaUpdate.style.display = 'block';
        }
        else 
        {
          otherReasonTextareaUpdate.style.display = 'none';
        }
      });
    </script>
  </body>
</html>