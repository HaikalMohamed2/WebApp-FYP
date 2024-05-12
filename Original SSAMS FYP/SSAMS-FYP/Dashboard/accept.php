<?php
include('../DBConn.php');

if(isset($_POST['accept'])) 
{
    $Email = $_POST['Email'];

    // Update status to 'accepted' in the database
    $query = "UPDATE staffaccount SET status = 'accepted' WHERE email = '$Email'";
    mysqli_query($conn, $query);

    // Redirect back to DBAdmin.php
    header("Location: AdminDashboard.php");
    exit();
}
?>
