<!--
	Student Name: Daniel Dinelli
	Student Number: C00242741
	Date: 15th March 2020
	Purpose: Inserts login id login name login date and login time to login details database then continues to the main menu
-->
<?php
	include 'db.inc.php';
	session_start();
	$sql = "Select max(loginId)as maxId from loginDetails";//gets max id from EmployeeApp
	$result = mysqli_query($con,$sql); //run query 
	$rowcount = mysqli_affected_rows($con);// returns the number of affected rows in the previous selest statement
	
	if($rowcount == 1){
		$row = mysqli_fetch_array($result);//retrives field names back from database
		$id = $row['maxId'] +1;//add ont to max id for new primary key
	}	
	$_SESSION['id'] = $id;//keep current id for logout
	$sql = "Insert into loginDetails (loginId,loginName,loginDate,loginTime) VALUES ('$id','$_SESSION[user]','$_SESSION[date]','$_SESSION[time]')";
	
	if(!mysqli_query($con,$sql)){
		die("An Error in the SQL Query: " . mysqli_error());
	}
header('Location: mainMenu.php') ;
?>