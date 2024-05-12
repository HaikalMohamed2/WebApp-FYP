<?php
    include('../DBConn.php');

    /* To improve future source code maintenance, the functions of DbStaff($conn), DbMgmt($conn), 
    DbAdminSA($conn), and DbAdminAA($conn) involve performing database SQL connections to retrieve data 
    from databases on each dashboard and minimizing multiple files for each dashboard that have source code to retrieve the data.*/


    function DbStaff($conn)
    {
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
                    <tr align="center">
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
                        <td><?php echo $row['DateReplacementClass']; ?></td>
                    </tr>
                <?php
            }

            // Insert data into DB and show in table
            if (isset($_POST['Add'])) 
            {
                $StaffName = $_POST['StaffName'];
                $Date = $_POST['Date'];
                $DateReplace = $_POST['DateReplacement'];
                $R_Absence = $_POST['R-Absence'];
                $OtherReason = $_POST['OtherReason']; // Get the Other reason text

                // Check if the reason is "Other" and set the reason text accordingly
                $ReasonAbsence = ($R_Absence == 'Other') ? $OtherReason : $R_Absence;

                // Gather all the checked classes into an array
                $classes = [];
                if (isset($_POST['Class']) && is_array($_POST['Class'])) 
                {
                    foreach ($_POST['Class'] as $class) 
                    {
                        $classes[] = $class;
                    }
                }

                // Convert the classes array into a string
                $Class = implode(',', $classes);

                // Use prepared statement to avoid SQL injection
                $InsertQuery = $conn->prepare("INSERT INTO `staffattendance` (StaffName, Class, Date, DateReplacementClass, ReasonAbsence) VALUES (?, ?, ?, ?, ?)");
                $InsertQuery->bind_param("sssss", $StaffName, $Class, $Date, $DateReplace, $ReasonAbsence);
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
                $StaffName = $_POST['StaffName'];
                $Date = $_POST['Date'];
                $DateReplace = $_POST['DateReplacement'];
                $R_Absence = $_POST['R-Absence'];
                $OtherReason = $_POST['OtherReason']; // Get the Other reason text

                // Check if the reason is "Other" and set the reason text accordingly
                $ReasonAbsence = ($R_Absence == 'Other') ? $OtherReason : $R_Absence;

                // Gather all the checked classes into an array
                $classes = [];
                if (isset($_POST['Class']) && is_array($_POST['Class'])) 
                {
                    foreach ($_POST['Class'] as $class) 
                    {
                        $classes[] = $class;
                    }
                }

                // Convert the classes array into a string
                $Class = implode(',', $classes);

                // Use prepared statement to avoid SQL injection
                $UpdateQuery = $conn->prepare("UPDATE `staffattendance` SET Class=?, ReasonAbsence=? WHERE StaffName=? AND Date=?");
                $UpdateQuery->bind_param("ssss", $Class, $ReasonAbsence, $StaffName, $Date);
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
                $StaffName = $_POST['StaffName'];
                $Date = $_POST['Date'];

                // Use prepared statement to avoid SQL injection
                $DeleteQuery = $conn->prepare("DELETE FROM `staffattendance` WHERE StaffName=? AND Date=?");
                $DeleteQuery->bind_param("ss", $StaffName, $Date);
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
        return $totalPages;
    }

    function DbMgmt($conn)
    {
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
                    echo "<script>alert('Successfully added a substitute teacher.');</script>";
                } 
                else 
                {
                    echo "<script>alert('Failed to add a substitute teacher.');</script>";
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
        }
        return $totalPages;
    }

    function DbAdminSA($conn)
    {
        if (!$conn) 
        {
            echo "Connection Failed";
        } 
        else 
        {
            /* Pagination for number of record on table */
            // Calculate total number of records
            $countQuery = "SELECT COUNT(*) AS total FROM `staffaccount` WHERE status = 'pending' OR status = 'accepted' OR status = 'declined'";
            $countResult = mysqli_query($conn, $countQuery);
            $totalRecords = mysqli_fetch_assoc($countResult)['total'];

            // Calculate total number of pages
            $recordsPerPage = 10;
            $totalPages = ceil($totalRecords / $recordsPerPage);

            // Determine current page number
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page - 1) * $recordsPerPage;

            // Select all pending and accepted/declined data from DB and display on table
            $query = "SELECT * FROM `staffaccount` WHERE status = 'pending' OR status = 'accepted' OR status = 'declined' ORDER BY StaffName DESC LIMIT ? OFFSET ?";
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
                    <td align="center"><?php echo $row['StaffName']; ?></td>

                    <td>
                        <input type="password" value="<?php echo $row['password']; ?>" id="password<?php echo $rowNumber; ?>" readonly>
                        <button id="togglePassword<?php echo $rowNumber; ?>" style="background: none; border: none;">
                            <i class="bi bi-eye-slash"></i>
                        </button>
                    </td>
                    <!-- This JS code is used to toggle the visibility of a password field in a form.  -->
                    <script>
                        const togglePassword<?php echo $rowNumber; ?> = document.querySelector('#togglePassword<?php echo $rowNumber; ?>');
                        const password<?php echo $rowNumber; ?> = document.querySelector('#password<?php echo $rowNumber; ?>');
                        const eyeIcon<?php echo $rowNumber; ?> = togglePassword<?php echo $rowNumber; ?>.querySelector('i');

                        togglePassword<?php echo $rowNumber; ?>.addEventListener('click', function (e) 
                        {
                            e.preventDefault();
                            // toggle the password visibility
                            if (password<?php echo $rowNumber; ?>.type === 'password') 
                            {
                                password<?php echo $rowNumber; ?>.type = 'text';
                                eyeIcon<?php echo $rowNumber; ?>.classList.remove('bi-eye-slash');
                                eyeIcon<?php echo $rowNumber; ?>.classList.add('bi-eye');
                            } 
                            else 
                            {
                                password<?php echo $rowNumber; ?>.type = 'password';
                                eyeIcon<?php echo $rowNumber; ?>.classList.remove('bi-eye');
                                eyeIcon<?php echo $rowNumber; ?>.classList.add('bi-eye-slash');
                            }
                        });
                    </script>
                    
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['status']; ?></td> <!-- Display the status -->
                    <td><?php echo $row['role']; ?></td>
                    <td align="center">
                        <?php if ($row['status'] == 'pending'): ?>
                            <!-- Add Accept and Decline buttons with form -->
                            <form method="post" action="accept.php">
                                <input type="hidden" name="Email" value="<?php echo $row['email']; ?>">
                                <button type="submit" class="btn btn-success btn-sm" name="accept">Accept</button>
                            </form>
                            <br>
                            <form method="post" action="decline.php">
                                <input type="hidden" name="Email" value="<?php echo $row['email']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" name="decline">Decline</button>
                            </form>
                        <?php endif; ?>
                    </td>
                    
                    <td align="center">
                        <?php 
                            if (empty($row['role']) && $row['status'] == 'accepted'): ?>
                                <!-- Add a form to set the role -->
                                <form method="post" action="">
                                    <input type="hidden" name="Email" value="<?php echo $row['email']; ?>">
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
                $StaffEmail = mysqli_real_escape_string($conn, $_POST['Email']);
                $role = mysqli_real_escape_string($conn, $_POST['role']);

                // Update the role in the database
                $updateQuery = "UPDATE `staffaccount` SET `role` = ? WHERE `email` = ?";
                $stmt = mysqli_prepare($conn, $updateQuery);
                mysqli_stmt_bind_param($stmt, 'ss', $role, $StaffEmail);
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
                $StaffName = $_POST['StaffName'];
                $Password = $_POST['StaffPassName'];
                $Email = $_POST['StaffEmail'];

                // Set password encryption
                $PassEnc = password_hash($Password, PASSWORD_DEFAULT);

                // Use prepared statement to avoid SQL injection
                $InsertQuery = $conn->prepare("INSERT INTO `staffaccount` (StaffName, password, email) VALUES (?, ?, ?)");
                $InsertQuery->bind_param("sss", $StaffName, $PassEnc, $Email);
                $InsertQuery->execute();
                echo "<script>alert('Succesfully added an staff account.');</script>";

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
                $StaffName = $_POST['Staff_Name'];
                $Password = $_POST['StaffPassName'];
                $Email = $_POST['StaffEmail'];
                
                // Set password encryption
                $PassEnc = password_hash($Password, PASSWORD_DEFAULT);

                // Use prepared statement to avoid SQL injection
                $UpdateQuery = $conn->prepare("UPDATE `staffaccount` SET password=?, email=? WHERE StaffName=?");
                $UpdateQuery->bind_param("sss", $PassEnc, $Email, $StaffName);
                $UpdateQuery->execute();
                echo "<script>alert('Succesfully update an staff account.');</script>";

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
                $StaffName = $_POST['StaffName'];
                $Email = $_POST['StaffEmail'];

                // Use prepared statement to avoid SQL injection
                $DeleteQuery = $conn->prepare("DELETE FROM `staffaccount` WHERE StaffName=? AND email=?");
                $DeleteQuery->bind_param("ss", $StaffName, $Email);
                $DeleteQuery->execute();
                echo "<script>alert('Succesfully deleted an staff account.');</script>";

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
        return $totalPages;
    }
    
    function DbAdminAA($conn)
    {
        if (!$conn) 
        {
            echo "Connection Failed";
        } 
        else 
        {
            /* Pagination for number of record on table */
            // Calculate total number of records
            $countQuery1 = "SELECT COUNT(*) AS total FROM `adminaccount`";
            $countResult1 = mysqli_query($conn, $countQuery1);
            $totalRecords1 = mysqli_fetch_assoc($countResult1)['total'];

            // Calculate total number of pages
            $recordsPerPage1 = 10;
            $totalPages1 = ceil($totalRecords1 / $recordsPerPage1);

            // Determine current page number
            $adminPage = isset($_GET['adminPage']) ? $_GET['adminPage'] : 1;
            $offset1 = ($adminPage - 1) * $recordsPerPage1;

            // Select all data from DB and display on table
            $query = "SELECT * FROM `adminaccount` ORDER BY AdminID DESC LIMIT ? OFFSET ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'ii', $recordsPerPage1, $offset1);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $rowNumber = 1; // Initialize the row number

            // Display all data from Table and display on webpage table for Admin Dashboard
            while ($row = mysqli_fetch_assoc($result)) 
            {
                ?>
                    <tr>
                        <td scope="row" align="center"><?php echo $rowNumber; ?></td> <!-- Display the row number -->
                        <td align="center"><?php echo $row['AdminID']; ?></td>
                        <td><?php echo $row['AdminEmail']; ?></td>
            
                        <td>
                            <input type="password" value="<?php echo $row['AdminPass']; ?>" class="password" id="password<?php echo $rowNumber; ?>" readonly>
                            <button class="togglePassword" style="background: none; border: none;">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </td>

                        <!-- This JS code is used to toggle the visibility of a password field in a form.  -->
                        <script>
                            window.onload = function() {
                                const togglePasswords = document.querySelectorAll('.togglePassword');
                                const passwords = document.querySelectorAll('.password');

                                togglePasswords.forEach((togglePassword, index) => {
                                    const password = passwords[index];
                                    const eyeIcon = togglePassword.querySelector('i');

                                    togglePassword.addEventListener('click', function (e) {
                                        e.preventDefault();
                                        // toggle the password visibility
                                        if (password.type === 'password') {
                                            password.type = 'text';
                                            eyeIcon.classList.remove('bi-eye-slash');
                                            eyeIcon.classList.add('bi-eye');
                                        } else {
                                            password.type = 'password';
                                            eyeIcon.classList.remove('bi-eye');
                                            eyeIcon.classList.add('bi-eye-slash');
                                        }
                                    });
                                });
                            }
                        </script>
                    </tr>
                <?php
                $rowNumber++; // Increment the row number
            }
            ?>

            <?php

            // Insert data into DB and show in table
            if (isset($_POST['AddAdmin'])) 
            {
                $AdminID = $_POST['AdminID'];
                $AdminEmail = $_POST['AdminEmail'];
                $AdminPass = $_POST['AdminPassword'];

                // Set password encryption
                $PassEnc = password_hash($AdminPass, PASSWORD_DEFAULT);

                // Use prepared statement to avoid SQL injection
                $InsertQuery = $conn->prepare("INSERT INTO `adminaccount` (AdminID, AdminEmail, AdminPass) VALUES (?, ?, ?)");
                $InsertQuery->bind_param("sss", $AdminID, $AdminEmail, $PassEnc);
                $InsertQuery->execute();
                echo "<script>alert('Succesfully added an admin account.');</script>";

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
            if (isset($_POST['UpdateAdmin'])) 
            {
                $AdminID = $_POST['AdminID'];
                $AdminEmail = $_POST['AdminEmail'];
                $AdminPass = $_POST['AdminPassword'];

                // Set password encryption
                $PassEnc = password_hash($AdminPass, PASSWORD_DEFAULT);

                // Use prepared statement to avoid SQL injection
                $UpdateQuery = $conn->prepare("UPDATE `adminaccount` SET AdminEmail=?, AdminPass=? WHERE AdminID=?");
                $UpdateQuery->bind_param("sss", $AdminEmail, $PassEnc, $AdminID);
                $UpdateQuery->execute();
                echo "<script>alert('Succesfully update an admin account.');</script>";

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
            if (isset($_POST['DeleteAdmin'])) 
            {
                $AdminID = $_POST['AdminID'];
                $AdminEmail = $_POST['AdminEmail'];

                // Use prepared statement to avoid SQL injection
                $DeleteQuery = $conn->prepare("DELETE FROM `adminaccount` WHERE AdminID=? AND AdminEmail=?");
                $DeleteQuery->bind_param("ss", $AdminID, $AdminEmail);
                $DeleteQuery->execute();
                echo "<script>alert('Succesfully deleted an admin account.');</script>";

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
        return $totalPages1;
    }
?>
