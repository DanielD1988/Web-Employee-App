<!--
	Student Name: Daniel Dinelli
	Student Number: C00242741
	Date: 15th March 2020
	Purpose: Inserts details into EmployeeApp tabled then returns back to form
-->
<?php
	include 'db.inc.php';
	session_start();
	date_default_timezone_set("UTC");//sets default time zone
	
	$sql = "Select max(employeeId)as maxId from EmployeeApp";//gets max id from EmployeeApp
	$result = mysqli_query($con,$sql); //run query 
	$rowcount = mysqli_affected_rows($con);// returns the number of affected rows in the previous selest statement
	
	if($rowcount == 1){
		$row = mysqli_fetch_array($result);//retrives field names back from database
		$id = $row['maxId'] +1;//add ont to max id for new primary key
	}	
	
	$sql = "Insert into EmployeeApp (employeeId,fName,lName,address,phoneNumber,DOB,jobTitle,loginName,password) VALUES ('$id','$_POST[fName]','$_POST[lName]','$_POST[address]','$_POST[phone]','$_POST[dob]','$_POST[title]','$_POST[login]','$_POST[pass]')";
	
	if(!mysqli_query($con,$sql)){//login name already in use
		
		$_SESSION['bad'] = $_POST['login'];	
	}
	else{//login name not in use

		$_SESSION['good'] = $_POST['address'];	
		$_SESSION['firstname'] = $_POST['fName'];
		$_SESSION['lastname'] = $_POST['lName'];
	}
	mysqli_close($con);
header('Location: addEmployee.php') ;
?>