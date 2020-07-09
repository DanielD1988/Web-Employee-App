<!--
	Student Name: Daniel Dinelli
	Student Number: C00242741
	Date: 16th March 2020	
	Purpose: A form to allow the user to select an employee to be displayed in a report
-->
<?php include 'mainMenu2.php'?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<DIV ALIGN=CENTER>
		<meta charset="UTF-8">
		<title>Select Employee</title>
		<script>
			function populates(){//fills the input fields with data from a selected listbox
			var sel = document.getElementById("listbox2");
			var result;
			result = sel.options[sel.selectedIndex].value;
			var personDetails = result.split('^');
				document.getElementById("login").value = personDetails[0];
			}
		</script>
		<style> 
		.frame {
			padding: 10px;
			border-style: hidden;
			border: solid;
			border-radius: 12px; /*rounded border*/
			border-color: rgb(40,40,40);/*black*/
			height: 220px;
			width:  400px;
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
	<form action="loginReport.php" method="Post">
		<header class="title">
			<h2>Login Report</h2>
		</header>
		<article class="inputbox1">
		<div class = "left">	
			<div class="inputbox"><!-- For list box-->
				<div style="float:center">
					<label for="login">Select Employee: </label>
					<?php include 'listLoginName.php';?>
					<input style="float:right;" type="hidden" name="login" id="login"/>
				</div>
			</div>
			<br>
		</div>
		</article>
		<article class="boxcentre">
			<input style="float:center;" type="submit" class="button" value="SUBMIT">
		</article>
	</form>
		</section>
	</body>
</html>