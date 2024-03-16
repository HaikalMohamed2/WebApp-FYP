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

    if (!$conn) 
    {
        echo "Connection Failed";
    } 
    else 
    {
        // Select all data from DB and display on table with Descending Order(DESC)
        $query = "SELECT * FROM `staffattendance` ORDER BY Date DESC";
        $result = mysqli_query($conn, $query);


        // Determine current page number
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $recordsPerPage;

        // Modify your existing query to include LIMIT and OFFSET for pagination
        $query = "SELECT * FROM `staffattendance` ORDER BY Date DESC LIMIT $recordsPerPage OFFSET $offset";
        $result = mysqli_query($conn, $query);
        
        // Display all data from database and display on webpage table for Staff Dashboard
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
                    if ($row['ReasonAbsence'] == 'Other' && isset($row['OtherReason'])) 
                    {
                        echo $row['OtherReason'];
                    } 
                    else 
                    {
                        echo $row['ReasonAbsence'];
                    }
                    ?>
                </td>
                <td><?php echo $row['SubsTeacherName']; ?></td>
            </tr>
            <?php
        }

        // Insert data into DB and show in table
        if (isset($_POST['Add'])) 
        {
            $StaffID = $_POST['StaffID'];
            $StaffName = $_POST['StaffName'];
            $Class = $_POST['Class'];
            $Date = $_POST['Date'];
            $R_Absence = $_POST['R-Absence'];
            $OtherReason = $_POST['OtherReason']; // Get the Other reason text

            // Check if the reason is "Other" and set the reason text accordingly
            $ReasonAbsence = ($R_Absence == 'Other') ? $OtherReason : $R_Absence;

            // Use prepared statement to avoid SQL injection
            $InsertQuery = $conn->prepare("INSERT INTO `staffattendance` (StaffID, StaffName, Class, Date, ReasonAbsence) VALUES (?, ?, ?, ?, ?)");
            $InsertQuery->bind_param("sssss", $StaffID, $StaffName, $Class, $Date, $ReasonAbsence);
            $InsertQuery->execute();

            // Auto Refresh Webpage when delete button is clicked
            ?>
                <script>
                    function autoRefresh()
                    {
                        window.location = window.location.href;
                    }
                    setInterval('autoRefresh()', 1000);
                </script>
            <?php
        }

        // Update data from DB and show in table
        if (isset($_POST['Update'])) 
        {
            $StaffID = $_POST['StaffID'];
            $Date = $_POST['Date'];
            $Class = $_POST['Class'];
            $R_Absence = $_POST['R-Absence'];
            $OtherReason = $_POST['OtherReason']; // Get the Other reason text

            // Check if the reason is "Other" and set the reason text accordingly
            $ReasonAbsence = ($R_Absence == 'Other') ? $OtherReason : $R_Absence;

            // Use prepared statement to avoid SQL injection
            $UpdateQuery = $conn->prepare("UPDATE `staffattendance` SET Class=?, ReasonAbsence=? WHERE StaffID=? AND Date=?");
            $UpdateQuery->bind_param("ssss", $Class, $ReasonAbsence, $StaffID, $Date);
            $UpdateQuery->execute();

            // Auto Refresh Webpage when delete button is clicked
            ?>
                <script>
                    function autoRefresh()
                    {
                        window.location = window.location.href;
                    }
                    setInterval('autoRefresh()', 1000);
                </script>
            <?php
        }

        // Delete data from DB and show in table
        if (isset($_POST['Delete'])) 
        {
            $StaffID = $_POST['StaffID'];
            $Date = $_POST['Date'];

            // Use prepared statement to avoid SQL injection
            $DeleteQuery = $conn->prepare("DELETE FROM `staffattendance` WHERE StaffID=? AND Date=?");
            $DeleteQuery->bind_param("ss", $StaffID, $Date);
            $DeleteQuery->execute();

            // Auto Refresh Webpage when delete button is clicked
            ?>
                <script>
                    function autoRefresh()
                    {
                        window.location = window.location.href;
                    }
                    setInterval('autoRefresh()', 1000);
                </script>
            <?php
        }
    }
?>
