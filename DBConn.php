<?php
     define("HOSTNAME", "localhost");
     define("USERNAME", "root");
     define("PASSWORD", "");
     define("DATABASE", "sams-database");
 
     // Connect to Database
     $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    // $conn = mysqli_connect("localhost", "root", "", "register") or die(myslq_error());
?>