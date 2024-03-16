<?php
include('DBConn.php');

if (!$conn) {
    echo "Connection Failed";
} else {
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
    $query = "SELECT * FROM `staffaccount` WHERE status = 'pending' OR status = 'accepted' OR status = 'declined' ORDER BY staff_id DESC LIMIT $recordsPerPage OFFSET $offset";
    $result = mysqli_query($conn, $query);

    $rowNumber = 1; // Initialize the row number

    // Display all data from Table and display on webpage table for Admin Dashboard
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td scope="row" align="center"><?php echo $rowNumber; ?></td> <!-- Display the row number -->
            <td align="center"><?php echo $row['staff_id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['status']; ?></td> <!-- Display the status -->
            <td align="center">
                <?php if ($row['status'] == 'pending'): ?>
                    <!-- Add Accept and Decline buttons with form -->
                    <form method="post" action="accept.php">
                        <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                        <button type="submit" name="accept">Accept</button>
                    </form>
                    <br>
                    <form method="post" action="decline.php">
                        <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                        <button type="submit" name="decline">Decline</button>
                    </form>
                <?php endif; ?>
            </td>
            <td><?php echo $row['role']; ?></td>
            <td>
                <?php if (empty($row['role']) && $row['status'] == 'accepted'): ?>
                    <!-- Add a form to set the role -->
                    <form method="post" action="">
                        <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                        <label for="role">Role:</label>
                        <select name="role" id="role">
                            <option value="Staff">Staff</option>
                            <option value="Management">Management</option>
                            <option value="Both">Both</option>
                        </select>
                        <button type="submit" name="set_role">Set Role</button>
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
    if (isset($_POST['set_role'])) {
        $staff_id = $_POST['staff_id'];
        $role = $_POST['role'];

        // Update the role in the database
        $updateQuery = "UPDATE `staffaccount` SET `role` = '$role' WHERE `staff_id` = '$staff_id'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Role set successfully');</script>";
            ?>
            <script>
                function autoRefresh() {
                    window.location = window.location.href;
                }

                setInterval('autoRefresh()', 1000);
            </script>
        <?php } else {
            echo "<script>alert('Failed to set role');</script>";
        }
    }
}
?>
