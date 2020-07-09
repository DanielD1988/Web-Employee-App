<?php
	/*
		Student Name: Daniel Dinelli 
		Student Number: C00242741
		Purpose: Sets delete flag to 1 and returns to delete form
		Date: 16th March 2020
	*/
	include 'db.inc.php'; //database connection
	//update employee delete flag
	$sql = "UPDATE EmployeeApp SET DeleteFlag = 1 WHERE employeeId = '$_POST[id]'";
	
	if(!mysqli_query($con,$sql)){
		die("An Error in the SQL Query: " . mysqli_error());
	}
	mysqli_close($con);
	header('Location:deleteEmployeeForm.php');//go back to delete form
?>