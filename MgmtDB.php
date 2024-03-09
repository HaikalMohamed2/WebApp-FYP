<?php
    include('DBConn.php');

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
                        <option value="Ali Bin Abu">Ali Bin Abu</option>
                        <option value="Sufian Bin Manan">Sufian Bin Manan</option>
                        <option value="Sofia Binti Jamal">Sofia Binti Jamal</option>
                    </select>
            </td>
            <td><button type="submit" class="btn btn-success" name="submit">Add</button></td>
            </form>
        </tr>
        <?php
    }
}
?>
