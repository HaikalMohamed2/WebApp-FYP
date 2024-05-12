<?php
    include('../DBConn.php');

    /* Pagination for number of record on table */
    // Calculate total number of records
    $countQuery = "SELECT COUNT(*) AS total FROM `staffattendance`";
    $countResult = mysqli_query($conn, $countQuery);
    $totalRecords = mysqli_fetch_assoc($countResult)['total'];

    // Calculate total number of pages
    $recordsPerPage = 10;
    $totalPages = ceil($totalRecords / $recordsPerPage);

    // Determine current page number
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $recordsPerPage;

    $updateResult = '';

    // Handle form submission
    if(isset($_POST['generate'])) 
    {
        $selectedMonth = $_POST['month'];
        $query = "SELECT * FROM `staffattendance` WHERE MONTH(Date) = $selectedMonth ORDER BY Date DESC LIMIT $recordsPerPage OFFSET $offset";
    } 
    else 
    {
        // Select all data from DB and display on table with Descending Order(DESC)
        $query = "SELECT * FROM `staffattendance` ORDER BY Date DESC LIMIT $recordsPerPage OFFSET $offset";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Display all data from Table and display on webpage table for Admin Dashboard
    while ($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr align="center">
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
            <td><?php echo $row['DateReplacementClass']; ?></td>
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
