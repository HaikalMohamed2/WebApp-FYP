<?php
    include('DBConn.php');

    if (!$conn) 
    {
        echo "Connection Failed";
    } 
    else 
    {
        // Check if the user is logged in as an admin
        // You should implement proper authentication and authorization mechanisms

        /* Pagination for number of record on table */
        // Calculate total number of records
        $countQuery = "SELECT COUNT(*) AS total FROM `staffaccount` WHERE status = 'pending' OR status = 'accepted' OR status = 'declined'";
        $countResult = mysqli_query($conn, $countQuery);
        $totalRecords = mysqli_fetch_assoc($countResult)['total'];

        // Calculate total number of pages
        $recordsPerPage = 50;
        $totalPages = ceil($totalRecords / $recordsPerPage);

        // Determine current page number
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $recordsPerPage;

        $updateResult = '';

        // Select all pending and accepted/declined data from DB and display on table
        $query = "SELECT * FROM `staffaccount` WHERE status = 'pending' OR status = 'accepted' OR status = 'declined' ORDER BY staff_id DESC LIMIT ? OFFSET ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ii', $recordsPerPage, $offset);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

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
                <td><?php echo $row['status']; ?></td> <!-- Display the status -->
                <td><?php echo $row['role']; ?></td>
                <td align="center">
                    <?php if ($row['status'] == 'pending'): ?>
                        <!-- Add Accept and Decline buttons with form -->
                        <form method="post" action="accept.php">
                            <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                            <button type="submit" class="btn btn-success btn-sm" name="accept">Accept</button>
                        </form>
                        <br>
                        <form method="post" action="decline.php">
                            <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm" name="decline">Decline</button>
                        </form>
                    <?php endif; ?>
                </td>
                
                <td align="center">
                    <?php 
                        if (empty($row['role']) && $row['status'] == 'accepted'): ?>
                            <!-- Add a form to set the role -->
                            <form method="post" action="">
                                <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                                <select class="form-select form-select-sm" name="role" id="role">
                                    <center>
                                        <option selected>Select role</option>
                                        <hr class="dropdown-divider">
                                        <option value="Staff">Staff</option>
                                        <option value="Management">Management</option>
                                        <option value="Both">Both</option>
                                    </center> 
                                </select>
                                <br>
                                <button type="submit" class="btn btn-success btn-sm" name="set_role">Set Role</button>
                            </form>
                        <?php elseif ($row['status'] != 'accepted'): ?>
                            <span style="color: red;">Account needs to be confirmed first before setting the role</span>
                        <?php endif; ?>
                </td>
            </tr>
            <?php
            $rowNumber++; // Increment the row number
        }

        // Process the form submission outside the loop
        if (isset($_POST['set_role'])) 
        {
            $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
            $role = mysqli_real_escape_string($conn, $_POST['role']);

            // Update the role in the database
            $updateQuery = "UPDATE `staffaccount` SET `role` = ? WHERE `staff_id` = ?";
            $stmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($stmt, 'ss', $role, $staff_id);
            if (mysqli_stmt_execute($stmt)) 
            {
                echo "<script>alert('Role set successfully');</script>";
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
            else 
            {
                echo "<script>alert('Failed to set role');</script>";
            }
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
            echo "<script>alert('Succesfully added an account.');</script>";

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
            echo "<script>alert('Succesfully update an account.');</script>";

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
            echo "<script>alert('Succesfully deleted an account.');</script>";

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
