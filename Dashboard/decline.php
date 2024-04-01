<?php
include('../DBConn.php');

if(isset($_POST['decline'])) 
{
    $staff_id = $_POST['staff_id'];

    // Update status to 'declined' in the database
    $query = "UPDATE staffaccount SET status = 'declined' WHERE staff_id = '$staff_id'";
    mysqli_query($conn, $query);

    // Redirect back to DBAdmin.php
    header("Location: AdminDashboard.php");
    exit();
}
?>
