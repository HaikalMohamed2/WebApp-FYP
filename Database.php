<?php
    // Define Hostname, Username, Password and Database
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "sams-database");

    // Connect to Database
    $Connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    
    // Select all data from DB and display on table with Descending Order(DESC)
    $query = "select * from `staffattendance` ORDER BY Date DESC";
    $result = mysqli_query($Connection, $query);

    if (!$Connection) 
    {
        echo "Connection Failed";
    }
    else
        while ($row = mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td align="center"><?php echo $row['StaffID']; ?></td>
                <td><?php echo $row['StaffName']; ?></td>
                <td><?php echo $row['Class']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['ReasonAbsence']; ?></td>
            </tr>
            <?php
        }
?>