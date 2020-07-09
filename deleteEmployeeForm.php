<!--
	Student Name: Daniel Dinelli
	Student Number: C00242741
	Date: 16th March 2020	
	Purpose: A form to show details of an employee for deletion
-->
<?php include 'mainMenu2.php'?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<DIV ALIGN=CENTER>
		<meta charset="UTF-8">
		<title>Delete Employee </title>
		<script>
			function populate(){//fills the input fields with data from a selected employee
			var sel = document.getElementById("listbox");
			var result;
			result = sel.options[sel.selectedIndex].value;
			var personDetails = result.split('^');
				document.getElementById("id").value = personDetails[0];
				document.getElementById("fName").value = personDetails[1];
				document.getElementById("lName").value = personDetails[2];
				document.getElementById("address").value = personDetails[3];
				document.getElementById("phone").value = personDetails[4];
				document.getElementById("dob").value = personDetails[5];
				document.getElementById("title").value = personDetails[6];
				document.getElementById("login").value = personDetails[7];
			}
			function confirmCheck()//checks if you are sure you want to delete employee
			{
				var response;
				response = confirm('Are you sure you want to delete this employee?');
				if(response){
					window.alert("The record was deleted sucessfully");
					document.getElementById("id").disabled = false;
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
			height: 560px;
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
	<form action="deleteEmployee.php" method="Post" onsubmit = "return confirmCheck()">
		<header class="title">
			<h2>Delete Employee</h2>
		</header>
		<article class="inputbox1">
		<div class = "left">	
			<div class="inputbox"><!-- For list box-->
				<div style="float:center">
					<?php include 'deleteListBox.php';?>
				</div>
			</div>
			<br>
			<div class="inputbox"><!-- For employee id-->
				<label for="id">First Name: </label>
				<input style="float:right;" type="text" name="id"  id="id" placeholder="Employee ID" disabled />
			</div>
			<br>
			<div class="inputbox"><!-- For first name-->
				<label for="fName">First Name: </label>
				<input style="float:right;" type="text" name="fName" id="fName" placeholder="First Name" disabled />
			</div>
			<br>
			<div class="inputbox"><!-- For last name-->
				<label for="lName">Last Name: </label>
				<input style="float:right;" type="text" name="lName"  id="lName" placeholder="Last name" disabled />
			</div>
			<br>
			<div class="inputbox"><!-- For address-->
				<label for="address">Address: </label>
				<textarea style="resize:none;" id="address" name="address" placeholder="Enter Address" rows="2" cols="40" disabled></textarea>
			</div>
			<br>
			<div class="inputbox"><!-- For phone number-->
				<label for="phone">Phone Number: </label>
				<input style="float:right;" type="text"  name="phone" id="phone" placeholder="Phone number" disabled />
			</div>
			<br>
			<div class="inputbox"><!--Date of birth-->
				<label for="dob">Date of Birth: </label>
				<input style="float:right;" type="date" name="dob" id="dob" disabled />
			</div>
			<br>
			<div class="inputbox"><!-- For Job Title-->
				<label for="title">Job Title: </label>
				<input style="float:right;" type="text" name="title" id="title" placeholder="Enter Job Title" disabled />
			</div>
			<br>
			<div class="inputbox"><!-- For login name-->
				<label for="login">Login Name: </label>
				<input style="float:right;" type="text" name="login" id="login" placeholder="Enter Login Name" disabled />
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
	</body>
</html>