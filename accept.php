<?php
include("DBConn.php");

if(isset($_POST['accept'])) 
{
    $staff_id = $_POST['staff_id'];

    // Update status to 'accepted' in the database
    $query = "UPDATE staffaccount SET status = 'accepted' WHERE staff_id = '$staff_id'";
    mysqli_query($conn, $query);

    // Redirect back to DBAdmin.php
    header("Location: AdminDashboard.php");
    exit();
}
?>
