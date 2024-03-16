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

    if (!$conn) 
    {
        echo "Connection Failed";
    } 
    else 
    {
        if (isset($_POST['submit'])) 
        {
            $staffId = $_POST['staff_id'];
            $substituteTeacher = $_POST['substitute_teacher'];

            // Update substitute teacher's name in the database
            $query = "UPDATE `staffattendance` SET SubsTeacherName = '$substituteTeacher' WHERE StaffID = '$staffId'";
            $result = mysqli_query($conn, $query);

            if ($result) 
            {
                $updateResult = 'success';
            } 
            else 
            {
                $updateResult = 'failure';
            }
        }

    // Select all data from DB and display on table with Descending Order(DESC)
    $query = "SELECT * FROM `staffattendance` ORDER BY Date DESC";
    $result = mysqli_query($conn, $query);

    // Determine current page number
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $recordsPerPage;

    // Modify your existing query to include LIMIT and OFFSET for pagination
    $query = "SELECT * FROM `staffattendance` ORDER BY Date DESC LIMIT $recordsPerPage OFFSET $offset";
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
}
?>
