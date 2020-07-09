<!--
	Student Name: Daniel Dinelli
	Student Number: C00242741
	Date: 16th March 2020	
	Purpose: A report on some fields retrieved from the login details table its set to order by login date where a login name was selected
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
		<h1>Employee Login Report </h1>
			<?php
			$sql = "select loginDate,loginTime,logoutTime from loginDetails where loginName = '$_POST[login]' order by loginDate";
			produceReport($con,$sql);	
			function produceReport($con,$sql){
				$result = mysqli_query($con,$sql);
				echo"<table border = 1><tr><th>Login Date</th><th>Login Time</th><th>Logout Time</th></tr>";
				
				while($row = mysqli_fetch_array($result)){
					echo "<td>".$row['loginDate']."</td>
						  <td>".$row['loginTime']."</td>
						  <td>".$row['logoutTime']."</td>
						  </tr>";		 
				}
				echo "</table>";
			}
			mysqli_close($con);
			?>
			<br>
			<a href="selectEmployee.php"><button style="float:center;background-color:rgb(40,40,40);color: white;" >Return to Previous Screen</button></a> <!-- https://www.quora.com/How-do-I-add-a-link-to-button-in-HTML-->
	</body>
</html>	