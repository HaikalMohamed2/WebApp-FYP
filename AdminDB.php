<?php
    // Define Hostname, Username, Password and Database
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "sams-database");

    // Connect to Database
    $Connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (!$Connection) 
    {
        echo "Connection Failed";
    }
    else
        // Select all data from DB and display on table with Descending Order(DESC)
        $query = "select * from `staffattendance` ORDER BY Date DESC";
        $result = mysqli_query($Connection, $query);

        // Display all data from Table and display on webpage table for Admin Dashboard
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
                <td>
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Select Teacher</option>
                    <option value="1">Ali Bin Abu</option>
                    <option value="2">Sufian Bin Manan</option>
                    <option value="3">Sofia Binti Jamal</option>
                  </select>
                </td>
                <td><a class="btn btn-success" href="#" role="button" id="UpdateAttend">Add</a></td>
            </tr>
            <?php
        }
?>