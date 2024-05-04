<?php
include('../DBConn.php');

if(isset($_POST['decline'])) 
{
    $Email = $_POST['Email'];

    // Update status to 'declined' in the database
    $query = "UPDATE staffaccount SET status = 'declined' WHERE email = '$Email'";
    mysqli_query($conn, $query);

    // Redirect back to DBAdmin.php
    header("Location: AdminDashboard.php");
    exit();
}
?>
