<!--
	Student Name: Daniel Dinelli
	Student Number: C00242741
	Date: 16th March 2020	
	Purpose: A report on some fields retrieved from the employee app table its set to order by surname or by id on push of a button
-->
<?php include 'mainMenu2.php'?>
<! DOCTYPE html>

<html>
	<head>
	</head>
	<body>
		<?php
			include 'db.inc.php';
			date_default_timezone_set('UTC');
		?>
		<form action = "employeeReport.php" method = "post" name = "reportForm">
			<input type = "hidden" name = "choice">
		</form>
		
		<h1>Person Report </h1>
		<h3>(Click a button to see the Employee Report in the desired order)</h3>
		<input type = 'button' id = "idButton" value = 'Order by ID' onclick = 'idOrder()' title = 'Click here to see employee in order of id'>
		<input type = 'button' id = "nameButton" value = 'Order by Surname' onclick = 'surnameOrder()' title = 'Click here to see employee in order of surname'>
		<br>
		<br>
		<script>
			function idOrder(){
				document.reportForm.choice.value = "id";
				document.reportForm.submit();
			}
			function surnameOrder(){
				document.reportForm.choice.value = "Surname";
				document.reportForm.submit();
			}					
		</script>	
		<?php
			$choice = "Surname";
			if(ISSET($_POST['choice'])){
				$choice = $_POST['choice'];
			}
		if($choice == "id"){			
		?>
			<script>
				document.getElementById("idButton").disabled = true;
				document.getElementById("nameButton").disabled = false;
			</script>	
			<?php
				$sql = "select employeeId,lName,fName,address,phoneNumber,jobTitle,loginName from EmployeeApp where DeleteFlag = 0 order by employeeId";
				produceReport($con,$sql);
				
		}
		else{			
			?>
			<script>
				document.getElementById("nameButton").disabled = true;
				document.getElementById("idButton").disabled = false;
			</script>	
			<?php
				$sql = "select employeeId,lName,fName,address,phoneNumber,jobTitle,loginName from EmployeeApp where DeleteFlag = 0 order by lName";
				produceReport($con,$sql);
		};	
			function produceReport($con,$sql){
				$result = mysqli_query($con,$sql);
				echo"<table border = 1><tr><th>ID</th><th>Last Name</th><th>First Name</th><th>address</th><th>Phone Number</th><th>Job Title</th><th>Login Name</th></tr>";
				
				while($row = mysqli_fetch_array($result)){
					echo "<td>".$row['employeeId']."</td>
						  <td>".$row['lName']."</td>
						 <td>".$row['fName']."</td>
						   <td>".$row['address']."</td>
						   <td>".$row['phoneNumber']."</td>
						   <td>".$row['jobTitle']."</td>
						   <td>".$row['loginName']."</td>
						  </tr>";		 
				}
				echo "</table>";
			}
			mysqli_close($con);
			?>
	</body>
</html>	