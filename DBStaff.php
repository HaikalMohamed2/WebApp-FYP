<?php
    include('DBConn.php');
    if (!$conn) 
    {
        echo "Connection Failed";
    }
    else
        // Select all data from DB and display on table with Descending Order(DESC)
        $query = "select * from `staffattendance` ORDER BY Date DESC";
        $result = mysqli_query($conn, $query);

        // Display all data from Table and display on webpage table for Staff Dashboard
        while ($row = mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td align="center"><?php echo $row['StaffID']; ?></td>
                <td><?php echo $row['StaffName']; ?></td>
                <td><?php echo $row['Class']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['ReasonAbsence']; ?></td>
                <td></td>
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
        $LeaveLetterFile = $_POST['LeaveLetterFile'];

        $InsertQuery = "insert into `staffattendance` (StaffID, StaffName, Class, Date, ReasonAbsence, LeaveLetter)
                    values ('$StaffID', '$StaffName', '$Class', '$Date', '$R_Absence', '$LeaveLetterFile')";
        $result = mysqli_query($conn, $InsertQuery);

        ?>
            <!-- Auto Refresh Webpage when add button is clicked -->
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
        $LeaveLetterFile = $_POST['LeaveLetterFile'];

        $UpdateQuery = "UPDATE `staffattendance` SET Class='$Class', ReasonAbsence='$R_Absence', LeaveLetter='$LeaveLetterFile' WHERE StaffID='$StaffID' AND Date='$Date'";
        $result = mysqli_query($conn, $UpdateQuery);

        ?>
            <!-- Auto Refresh Webpage when update button is clicked -->
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

        $DeleteQuery = "DELETE FROM `staffattendance` WHERE StaffID='$StaffID' AND Date='$Date'";
        $result = mysqli_query($conn, $DeleteQuery);

        ?>
            <!-- Auto Refresh Webpage when delete button is clicked -->
            <script>
                function autoRefresh()
                {
                    window.location = window.location.href;
                }
                setInterval('autoRefresh()', 1000);
            </script>
        <?php
    }
?>