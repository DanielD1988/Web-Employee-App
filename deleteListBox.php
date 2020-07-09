<?php
	/*
		Student Name: Daniel Dinelli
		Student Number: C00242741
		Purpose: Retrive fields from database where the deleted flag is 0 
		Date 16th March 2020
	*/
	include 'db.inc.php';
	
	$sql = "SELECT employeeId,fName,lName,address,phoneNumber,DOB,jobTitle,loginName FROM EmployeeApp where DeleteFlag = 0";
	if(!$result = mysqli_query($con,$sql)){
		die('Error in querying the database' . mysqli_error($con));
	}
	echo "<select name = 'listbox' id = 'listbox' onclick = 'populate()'>";
	
	while($row = mysqli_fetch_array($result)){
		$id = $row['employeeId'];
		$fName = $row['fName'];
		$lName = $row['lName'];
		$address = $row['address'];
		$phone = $row['phoneNumber'];
		$dob = $row['DOB'];
		$title = $row['jobTitle'];
		$login = $row['loginName'];
		$allText = "$id^$fName^$lName^$address^$phone^$dob^$title^$login";
		echo "<option value = '$allText'>$fName $lName</option>";
	}
	echo "</select>";
	mysqli_close($con);
?>