<?php
    include('DBConn.php');

    /* Pagination for number of record on table */
    // Calculate total number of records
    $countQuery = "SELECT COUNT(*) AS total FROM `staffattendance`";
    $countResult = mysqli_query($conn, $countQuery);
    $totalRecords = mysqli_fetch_assoc($countResult)['total'];

    // Calculate total number of pages
    $recordsPerPage = 50;
    $totalPages = ceil($totalRecords / $recordsPerPage);

    // Determine current page number
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $recordsPerPage;

    $updateResult = '';

    // Handle form submission
    if(isset($_POST['generate'])) {
        $selectedMonth = $_POST['month'];
        $query = "SELECT * FROM `staffattendance` WHERE MONTH(Date) = $selectedMonth ORDER BY Date DESC LIMIT $recordsPerPage OFFSET $offset";
    } else {
        // Select all data from DB and display on table with Descending Order(DESC)
        $query = "SELECT * FROM `staffattendance` ORDER BY Date DESC LIMIT $recordsPerPage OFFSET $offset";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Display all data from Table and display on webpage table for Admin Dashboard
    while ($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td align="center"><?php echo $row['StaffID']; ?></td>
            <td><?php echo $row['StaffName']; ?></td>
            <td><?php echo $row['Class']; ?></td>
            <td><?php echo $row['Date']; ?></td>
            <td>
                <?php
                if ($row['ReasonAbsence'] == 'Other' && isset($row['OtherReason'])) {
                    echo $row['OtherReason'];
                } else {
                    echo $row['ReasonAbsence'];
                }
                ?>
            </td>
            <td><?php echo $row['SubsTeacherName']; ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="staff_id" value="<?php echo $row['StaffID']; ?>">
                    <select class="form-select" aria-label="Default select example" name="substitute_teacher">
                        <option selected align="center">Select Teacher</option>
                        <hr class="dropdown-divider">
                        <option value="RAZALI BIN YAHYA">RAZALI BIN YAHYA</option>
                        <option value="FAEZAH BINTI DAUZ">FAEZAH BINTI DAUZ</option>
                        <option value="ZAKI BIN MAHMOD">ZAKI BIN MAHMOD</option>
                        <option value="ASYIKIN BINTI NORZULAN">ASYIKIN BINTI NORZULAN</option>
                        <option value="AYUB BIN AHMAD">AYUB BIN AHMAD</option>
                        <option value="ABU BIN ABDULLAH">ABU BIN ABDULLAH</option>
                        <option value="SITI RAMLAH BINTI ABDUL RAHMAN">SITI RAMLAH BINTI ABDUL RAHMAN</option>
                        <option value="KAMARUDDIN BIN ALI">KAMARUDDIN BIN ALI</option>
                        <option value="NAWI BIN IMAN">NAWI BIN IMAN</option>
                        <option value="HAFIZAH BINTI ZAKARIA">HAFIZAH BINTI ZAKARIA</option>
                    </select>
            </td>
            <td><button type="submit" class="btn btn-success" name="submit">Add</button></td>
            </form>
        </tr>
        <?php
    }
?>

<!-- Generate Report Form -->
<form method="post">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <label for="monthSelect" class="form-label">Select Month:</label>
            <select class="form-select" id="monthSelect" name="month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <button type="submit" class="btn btn-primary mt-3" name="generate">Generate Report</button>
        </div>
    </div>
</form>
