<?php
	/*
		Student Name: Daniel Dinelli 
		Student Number: C00242741
		Purpose: Used to set the logout time in login details table after logout return to login screen
		Date: 16th March 2020
	*/
	session_start();
	include 'db.inc.php';
	$logout =  date('H:i:s');//holds current time
	
	$sql = "Update loginDetails set logoutTime = '$logout' where loginId = '$_SESSION[id]'";
	if(!mysqli_query($con,$sql)){
		die("An Error in the SQL Query: " . mysqli_error());
	}
	session_destroy();
	header('Location: loginScreen.php') ;
?>