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
    <title>Staff Dashboard</title>
    <!-- Bootstrap for CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS from datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <!-- Custom CSS -->
    <link href="MyStyle.css" rel="stylesheet">
  </head>

  <body class="BodyColor">
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-lg NavFont NavColor">
        <div class="container-fluid" id="navTheme">
          <a href="..\MainPage\index.php" class="navbar-brand"><img src="..\SourceImg\SEMUJA.png" width="20%" height="20%"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav" method="post">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="StaffDashboard.php"><i class="bi bi-house-door"></i> Home</a>
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
          <br>
          <h2 class="text-center">Staff Dashboard</h2><br>
          <div class="row justify-content-center">
                <div class="col-12 col-sm-3 mb-2">
                    <button type="button" class="btn btn-success w-100 p-2" data-bs-toggle="modal" data-bs-target="#AddAbsencesModal">Add Absences</button>
                </div>
                <div class="col-12 col-sm-3 mb-2">
                    <button type="button" class="btn btn-primary w-100 p-2" data-bs-toggle="modal" data-bs-target="#UpdateAbsencesModal">Update Absences</button>
                </div>
                <div class="col-12 col-sm-3 mb-2">
                    <button type="button" class="btn btn-danger w-100 p-2" data-bs-toggle="modal" data-bs-target="#DeleteAbsencesModal">Delete Absences</button>
                </div>
              </div>
          <!-- Table -->
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-light table-hover table-sm" id="TablePosition">

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
                        <!-- Dropdown List -->
                        <div class="mb-3">
                          <label for="Name" class="form-label">Name</label>
                          <select class="form-control" name="StaffName" required>
                            <?php 
                                include('DashboardConn.php');
                                $Query = "SELECT StaffName FROM staffaccount;";
                                $result = mysqli_query($conn, $Query);
                            ?>
                          <option value="">Please Select Your Name</option>
                          <hr class="b-example-divider">
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) 
                                {
                                  echo "<option value='" . $row['StaffName'] . "'>" . $row['StaffName'] . "</option>";
                                }
                            ?>
                          </select>
                        </div>

                        <!-- Select Class-->
                        <div>
                          <label class="form-label">Class</label>
                          <div class="checkbox-wrapper" style="max-height: 200px; overflow-y: auto;">
                            <div name="Class">
                              <hr class="b-example-divider">
                              <div class="list-group">
                                <!-- KELAS TINGKATAN 1 -->
                                <optgroup label="Form 1" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 1">UBAIDAH 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 2">UBAIDAH 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 3">UBAIDAH 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 4">UBAIDAH 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 5">UBAIDAH 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 6">UBAIDAH 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 7">UBAIDAH 7
                                </label>
                                <hr class="b-example-divider">

                                <!-- KELAS TINGKATAN 2 -->
                                <optgroup label="Form 2" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 1">SALMAN 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 2">SALMAN 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 3">SALMAN 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 4">SALMAN 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 5">SALMAN 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 6">SALMAN 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 7">SALMAN 7
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 8">SALMAN 8
                                </label>
                                <hr class="b-example-divider">

                                <!-- KELAS TINGKATAN 3 -->
                                <optgroup label="Form 3" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 1">AMMAR 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 2">AMMAR 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 3">AMMAR 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 4">AMMAR 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 5">AMMAR 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 6">AMMAR 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 7">AMMAR 7
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 8">AMMAR 8
                                </label>
                                <hr class="b-example-divider">

                                <!-- KELAS TINGKATAN 4 -->
                                <optgroup label="Form 4" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 1">HAMZAH 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 2">HAMZAH 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 3">HAMZAH 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 4">HAMZAH 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 5">HAMZAH 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 6">HAMZAH 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 7">HAMZAH 7
                                </label>
                                <hr class="b-example-divider">

                                <!-- KELAS TINGKATAN 5 -->
                                <optgroup label="Form 5" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 1">ANAS 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 2">ANAS 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 3">ANAS 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 4">ANAS 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 5">ANAS 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 6">ANAS 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 7">ANAS 7
                                </label>
                                <hr class="b-example-divider">
                              </div>
                          </div>
                          </div>
                        </div>
                        <br>

                        <!-- Date Picker -->
                        <div class="mb-3">
                          <label class="form-label">Date</label>
                          <input type="text" class="form-control" name="Date" id="date1" placeholder="Select Dates" readonly required>
                        </div>

                        <!-- Alert -->
                        <div class="alert alert-warning d-none" id="alert1">
                          Maximum date that you can select is 5 only!
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

                        <!-- Date of Replacement -->
                        <div class="mb-3">
                          <label class="form-label">Date For Replacement Class</label>
                          <input type="text" class="form-control" name="DateReplacement" id="date2" placeholder="Select Dates" readonly required>
                        </div>

                        <!-- Alert -->
                        <div class="alert alert-warning d-none" id="alert2">
                          Maximum date that you can select is 5 only!
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
              <div class="modal fade" id="UpdateAbsencesModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-2" aria-labelledby="UpdateAbsencesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="UpdateAbsencesModalLabel">Update Absences</h1>
                    </div>
                    <!-- Modal Body(Dialog Box / Popup Window) -->
                    <div class="modal-body">
                      <form method="post">
                        <!-- Dropdown List -->
                        <div class="mb-3">
                          <label for="Name" class="form-label">Name</label>
                          <select class="form-control" name="StaffName" required>
                            <?php 
                                $Query = "SELECT StaffName FROM staffaccount;";
                                $result = mysqli_query($conn, $Query);
                            ?>
                          <option value="">Please Select Your Name</option>
                          <hr class="b-example-divider">
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) 
                                {
                                  echo "<option value='" . $row['StaffName'] . "'>" . $row['StaffName'] . "</option>";
                                }
                            ?>
                          </select>
                        </div>

                        <!-- Date Picker -->
                        <div class="mb-3">
                          <label class="form-label">Date</label>
                          <input type="text" class="form-control" name="Date" id="date3" placeholder="Select Dates" readonly required>
                        </div>

                        <!-- Alert -->
                        <div class="alert alert-warning d-none" id="alert3">
                          Maximum date that you can select is 5 only!
                        </div>

                        <center>
                          <hr class="b-example-divider">
                          <h3>Update</h3>
                        </center>
                        <hr class="b-example-divider">

                        <!-- Select Class-->
                        <div>
                          <label class="form-label">Class</label>
                          <div class="checkbox-wrapper" style="max-height: 200px; overflow-y: auto;">
                            <div name="Class">
                              <hr class="b-example-divider">
                              <div class="list-group">
                                <!-- KELAS TINGKATAN 1 -->
                                <optgroup label="Form 1" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 1">UBAIDAH 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 2">UBAIDAH 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 3">UBAIDAH 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 4">UBAIDAH 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 5">UBAIDAH 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 6">UBAIDAH 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="UBAIDAH 7">UBAIDAH 7
                                </label>
                                <hr class="b-example-divider">

                                <!-- KELAS TINGKATAN 2 -->
                                <optgroup label="Form 2" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 1">SALMAN 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 2">SALMAN 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 3">SALMAN 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 4">SALMAN 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 5">SALMAN 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 6">SALMAN 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 7">SALMAN 7
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="SALMAN 8">SALMAN 8
                                </label>
                                <hr class="b-example-divider">

                                <!-- KELAS TINGKATAN 3 -->
                                <optgroup label="Form 3" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 1">AMMAR 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 2">AMMAR 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 3">AMMAR 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 4">AMMAR 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 5">AMMAR 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 6">AMMAR 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 7">AMMAR 7
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="AMMAR 8">AMMAR 8
                                </label>
                                <hr class="b-example-divider">

                                <!-- KELAS TINGKATAN 4 -->
                                <optgroup label="Form 4" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 1">HAMZAH 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 2">HAMZAH 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 3">HAMZAH 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 4">HAMZAH 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 5">HAMZAH 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 6">HAMZAH 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="HAMZAH 7">HAMZAH 7
                                </label>
                                <hr class="b-example-divider">

                                <!-- KELAS TINGKATAN 5 -->
                                <optgroup label="Form 5" align="center"></optgroup>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 1">ANAS 1
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 2">ANAS 2
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 3">ANAS 3
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 4">ANAS 4
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 5">ANAS 5
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 6">ANAS 6
                                </label>
                                <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="Class[]" value="ANAS 7">ANAS 7
                                </label>
                                <hr class="b-example-divider">
                              </div>
                          </div>
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

                        <!-- Date of Replacement -->
                        <div class="mb-3">
                          <label class="form-label">Date For Replacement Class</label>
                          <input type="text" class="form-control" name="DateReplacement" id="date4" placeholder="Select Dates" readonly required>
                        </div>

                        <!-- Alert -->
                        <div class="alert alert-warning d-none" id="alert4">
                          Maximum date that you can select is 5 only!
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
              <div class="modal fade" id="DeleteAbsencesModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="DeleteAbsencesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="DeleteAbsencesModalLabel">Delete Absences</h1>
                    </div>
                    <!-- Modal Body(Dialog Box / Popup Window) -->
                    <div class="modal-body">
                      <form method="post">
                        <!-- Dropdown List -->
                        <div class="mb-3">
                          <label for="Name" class="form-label">Name</label>
                          <select class="form-control" name="StaffName" required>
                            <?php 
                                $Query = "SELECT StaffName FROM staffaccount;";
                                $result = mysqli_query($conn, $Query);
                            ?>
                          <option value="">Please Select Your Name</option>
                          <hr class="b-example-divider">
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) 
                                {
                                  echo "<option value='" . $row['StaffName'] . "'>" . $row['StaffName'] . "</option>";
                                }
                            ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="Date" class="form-label">Date</label>
                          <input type="text" class="form-control" name="Date" id="date5" placeholder="Select Dates" readonly required>
                        </div>
                        <!-- Alert -->
                        <div class="alert alert-warning d-none" id="alert5">
                          Maximum date that you can select is 5 only!
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
                $totalPages = DbStaff($conn);
              ?>
              <thead align="center">
                <th colspan="6" class="text-bg-dark">STAFF AND TEACHER ABSENCE LIST</th>
                <tr>
                  <th colspan="6">
                    <!-- Search Input -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6">
                            <input class="form-control" id="searchInput" type="text" placeholder="Search...">
                        </div>
                    </div>
                  </th>
                </tr>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Class</th>
                  <th scope="col">Date</th>
                  <th scope="col">Reason Absence</th>
                  <th scope="col">Date For Replacement Class </th>
                </tr>
              </thead>
            </table>
          </div>
          <br>
          <!-- Pagination links -->
          <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                  <?php 
                  
                  for ($i = 1; $i <= $totalPages; $i++) : ?>
                      <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                          <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                      </li>
                  <?php endfor; ?>
              </ul>
          </nav>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Custom JS -->
    <script src="StaffJs.js"></script>
  </body>
</html>