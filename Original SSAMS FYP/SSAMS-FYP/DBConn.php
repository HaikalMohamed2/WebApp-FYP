<?php 
	// ---------- Connection to Database ----------
	
	// --->> Localhost Database Connection - XAMPP <<---
	// Method 1:
	define("HOSTNAME", "localhost");
	define("USERNAME", "root");
	define("PASSWORD", "");
	define("DATABASE", "sams-database");
	$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
	 
	// --->> Web Hosting Database Connection <<---
	// Method 1
	//  define("HOSTNAME", "sql113.infinityfree.com");
	//  define("USERNAME", "if0_36289825");
	//  define("PASSWORD", "DYXQC9fw8gDQR");
	//  define("DATABASE", "if0_36289825_sams_database");
	
	// Method 2
	//$conn = mysqli_connect("sql113.infinityfree.com", "if0_36289825", "DYXQC9fw8gDQR", "if0_36289825_sams_database");
?>