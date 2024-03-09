<?php
    include('DBConn.php');

    $updateResult = '';

    if (!$conn) 
    {
        echo "Connection Failed";
    } 
    else 
    {
        // Select all data from DB and display on table
        $query = "SELECT * FROM `staffaccount`";
        $result = mysqli_query($conn, $query);

        $rowNumber = 1; // Initialize the row number

        // Display all data from Table and display on webpage table for Admin Dashboard
        while ($row = mysqli_fetch_assoc($result)) 
        {
            ?>
            <tr>
                <td scope="row" align="center"><?php echo $rowNumber; ?></td> <!-- Display the row number -->
                <td align="center"><?php echo $row['staff_id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <?php
            $rowNumber++; // Increment the row number
        }

        // Insert data into DB and show in table
        if (isset($_POST['Add'])) 
        {
            $StaffID = $_POST['StaffID'];
            $Username = $_POST['StaffUname'];
            $Password = $_POST['StaffPassName'];
            $Email = $_POST['StaffEmail'];

            // Use prepared statement to avoid SQL injection
            $InsertQuery = $conn->prepare("INSERT INTO `staffaccount` (staff_id, username, password, email) VALUES (?, ?, ?, ?)");
            $InsertQuery->bind_param("ssss", $StaffID, $Username, $Password, $Email);
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
            $Username = $_POST['StaffUname'];
            $Password = $_POST['StaffPassName'];
            $Email = $_POST['StaffEmail'];

            // Use prepared statement to avoid SQL injection
            $UpdateQuery = $conn->prepare("UPDATE `staffaccount` SET username=?, password=?, email=? WHERE staff_id=?");
            $UpdateQuery->bind_param("ssss", $Username, $Password, $Email, $StaffID);
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
            $Email = $_POST['StaffEmail'];

            // Use prepared statement to avoid SQL injection
            $DeleteQuery = $conn->prepare("DELETE FROM `staffaccount` WHERE staff_id=? AND email=?");
            $DeleteQuery->bind_param("ss", $StaffID, $Email);
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
