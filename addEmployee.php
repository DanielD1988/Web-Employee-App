<?php session_start();?>
<!--
	Student Name: Daniel Dinelli
	Student Number: C00242741
	Date: 15th March 2020	
	Purpose: A simple form to insert details into the employee app table
-->
<?php include 'mainMenu2.php'?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<DIV ALIGN=CENTER>
		<meta charset="UTF-8">
		<title>Add New Employee </title>
		<script>
			function DateCheck(input)//used to check if birth date is valid
			{
				 var startDate = new Date (input.value);
				 var today = new Date();
				 
				 
				 //to get rid of hour,min,sec,millisecond
				 //startdate does not include time
				
				today.setHours(0,0,0,0);
				 
				 //compare two dates as dates only without time
				 if (startDate <= today){
					 input.setCustomValidity('');
					 
				 }
				 else{
					 //input is valid reset error message
					 
					 input.setCustomValidity('Birth Date Must Be Today or before today');
				 }
			}
			function confirmCheck()//checks if you are sure you want to add employee
			{
				var response;
				response = confirm('Are you sure you want to add this employee?');
				if(response){
				
					return true;
				}
				else{
					return false;
				}
			}
		</script>
		<style> 
		.frame {
			padding: 10px;
			border-style: hidden;
			border: solid;
			border-radius: 12px; /*rounded border*/
			border-color: rgb(40,40,40);/*black*/
			height: 510px;
			width:  430px;
		}
		.title {
			text-align: center;
			color:rgbrgb(40,40,40);/*Black*/
			font-size:20px;
			padding: 0 0 20px 0;
			font-family: Arial, Helvetica, sans-serif;
		}
		.inputbox1 {   
			padding:5px 50px;
			font-family: Arial, Helvetica, sans-serif;
			color:rgb(40,40,40);/*Black*/
		}
		.boxcentre { /*align buttons*/
			text-align:center;
			padding:20px;
		}
		.button {
			background-color: rgb(40,40,40);/*Black*/
			border: none;
			border-radius:8px;
			color: white;
			padding: 15px 32px;
			text-align: center;
			display: inline-block;
			font-size: 14px;
			margin: 4px 2px;
			cursor: pointer;
		}
		.left {
		  text-align: left;
		}
	</style>
	</head>
	<body>
<section class="frame">
	<form action="insertEmployee.php" method="Post" onsubmit = "return confirmCheck()">
		<header class="title">
			<h2>Add Employee</h2>
		</header>
		<article class="inputbox1">
		<div class = "left">	
			<div class="inputbox"><!-- For first name-->
				<label for="fName">First Name: </label>
				<input style="float:right;" type="text" name="fName" pattern="[A-Za-z\s]*" id="fName" title="Only enter a-z,A-z and spaces" placeholder="Enter First Name" required />
			</div>
			<br>
			<div class="inputbox"><!-- For last name-->
				<label for="lName">Last Name: </label>
				<input style="float:right;" type="text" name="lName"  pattern="[A-Za-z\s]*" id="lName" title="Only enter a-z,A-z and spaces" placeholder="Enter last name" required />
			</div>
			<br>
			<div class="inputbox"><!-- For address-->
				<label for="address">Address: </label>
				<textarea style="resize:none;" id="address" name="address" placeholder="Enter Address" rows="2" cols="40"></textarea>
			</div>
			<br>
			<div class="inputbox"><!-- For phone number-->
				<label for="phone">Phone Number: </label>
				<input style="float:right;" type="text"  name="phone" pattern="[0-9\s]*" id="phone" title="Only enter 0-9 and spaces" placeholder="Enter Phone number" required />
			</div>
			<br>
			<div class="inputbox"><!--Date of birth-->
				<label for="dob">Date of Birth: </label>
				<input style="float:right;" type="date" name="dob" oninput="DateCheck(this)" id="dob" required />
			</div>
			<br>
			<div class="inputbox"><!-- For Job Title-->
				<label for="title">Job Title: </label>
				<input style="float:right;" type="text" name="title" id="title" placeholder="Enter Job Title" required />
			</div>
			<br>
			<div class="inputbox"><!-- For login name-->
				<label for="login">Login Name: </label>
				<input style="float:right;" type="text" name="login" id="login" placeholder="Enter Login Name" required />
			</div>
			<br>
			<div class="inputbox"><!-- For password-->
				<label for="pass">Psssword: </label>
				<input style="float:right;" type="text" name="pass" id="pass" placeholder="Enter password" required />
			</div>
			<br>
		</div>
		</article>
		<article class="boxcentre">
			<input style="float:center;" type="submit" class="button" value="SUBMIT">
			<input style="float:center;" type="reset" class="button" value="CLEAR">
		</article>
	</form>
		</section>
		<?php
			if(ISSET($_SESSION['good'])){
				echo "<h1>Employee Record Added for ". $_SESSION['firstname'] . " " .  $_SESSION['lastname'] . "</h1>";
			}
			if(ISSET($_SESSION['bad'])){
				echo "<h1>The login name ". $_SESSION['bad'] . " is already been taken"."</h1>";
			}			
			session_destroy();
		?>	
	</body>
</html>