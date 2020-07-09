<?php
	/*
		Student Name: Daniel Dinelli
		Student Number: C00242741
		Purpose: Retrive login name first name and last name from employee app table where the delete flag = 0
		Date 16th March 2020
	*/
	include 'db.inc.php';
	
	$sql = "SELECT loginName,fName,lName FROM EmployeeApp where DeleteFlag = 0";
	if(!$result = mysqli_query($con,$sql)){
		die('Error in querying the database' . mysqli_error($con));
	}
	echo "<select name = 'listbox2' id = 'listbox2' onclick = 'populates()'>";
	
	while($row = mysqli_fetch_array($result)){
		$login = $row['loginName'];
		$fName = $row['fName'];
		$lName = $row['lName'];
		$allText = "$login";
		echo "<option value = '$allText'>$fName $lName</option>";
	}
	echo "</select>";
	mysqli_close($con);
?>