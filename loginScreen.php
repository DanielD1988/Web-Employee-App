<!--
	Student Name: Daniel Dinelli
	Student Number: C00242741
	Date: 15th March 2020
	Purpose: A simple login screen that gives the user three attempte to login if sucessful the user will then get a welcome message if its there birthday
	they will also get a message saying happy birthday. They will then have a button allowing them access to the main menu if the three attempts are up 
	they will get a message saying Sorry - You have used all 3 attempts Shutting down...
-->
<style>
	.border/*Used for putting styling on the login and the welcome message*/
	{
		text-align: center;
		border-style: solid;
		width: 30%;
		height: 250px;
		position: relative;
		top: 100px;
		left: 450px;
		font-weight: bold;
		background-color: rgb(119,136,153);/*Dark grey*/
	}
	.message/*Used for putting the error message below the login border and makes the font of the message bold*/
	{
		position: relative;
		top: 120px;
		left: 450px;
		font-weight: bold;
	}
	.message2/*Used for putting the error message in the center of the screen and makes the font of the message bold and resizes the message*/
	{
		position: absolute;
		top: 200px;
		left: 520px;
		font-size: 20px;
		font-weight: bold;
	}
</style>
<?php 
include 'db.inc.php';
session_start();
if(isset($_POST['loginName']) && isset($_POST['passWord']))
{
	$attempts = $_SESSION['attempts'];
	$sql = "SELECT * FROM EmployeeApp WHERE loginName = '$_POST[loginName]' AND password = '$_POST[passWord]'";
	
	if(!mysqli_query($con,$sql))
	{
		echo "Error in query " . mysqli_error($con);
	}
	
	else
	{
		if(mysqli_affected_rows($con) == 0)
		{
			$attempts++;
			if($attempts <= 3)
			{
				$_SESSION['attempts'] = $attempts;
				buildPage($attempts);
				echo "<div class='message'>No record found with this login name and password combination</div>";
			}
			else
			{
				echo "<div class='message2'>Sorry - You have used all 3 attempts<br>Shutting down...</div>";
			}		
		}
		else
		{
				//sucessfil loginName
				//used for change password screen
				$_SESSION['user'] = $_POST['loginName'];
				//used to get first name and last name from database where equal to login name
				$sql = "SELECT fName,lName FROM EmployeeApp where loginName = '$_POST[loginName]'";
				if(!$result = mysqli_query($con,$sql))
				{
					echo "Error in query " . mysqli_error($con);
				}
				while($row = mysqli_fetch_array($result))//retrive first name and last name from database
				{
					$fname = $row['fName'];
					$lname = $row['lName'];
				}
				//used to get current date and time of login
				$_SESSION['date'] = date('Y-m-d');//holds current date 
				$_SESSION['time'] = date('H:i:s');//holds current time
				//check if todays your birthday
				$sql = "SELECT * FROM EmployeeApp where DATE_FORMAT(DOB, '%m-%d') = DATE_FORMAT(CURDATE(), '%m-%d') and loginName = '$_POST[loginName]'";
				if(!mysqli_query($con,$sql))
				{
					echo "Error in query " . mysqli_error($con);
				}
				if(mysqli_affected_rows($con) == 0)//if its not there birthday
				{	
					echo "<div class = 'border'>
					<h3>Welcome $fname $lname</h3>
					<h3>The current date is $_SESSION[date]</h3>
					<h3>The current time is $_SESSION[time]</h3>
					<h3> Click the button to be brought to the main menu</h3>
					<input type = 'button' value = 'Main Menu' onclick = 'window.location = \"insertLogin.php\"'>
					</div>";
				}
				else//if its there birthday
				{
					echo "<div class = 'border'>
					<h3>Welcome $fname $lname</h3>
					<h3>Today is your birthday happy birthday</h3>
					<h3>The current date is $_SESSION[date]</h3>
					<h3>The current time is $_SESSION[time]</h3>
					<h3> Click the button to be brought to the main menu</h3>
					<input type = 'button' value = 'Main Menu' onclick = 'window.location = \"insertLogin.php\"'>
					</div>";
				}
		}
	}
}
else
{
	//building page for inital display
	$attempts = 1; //screen will be displayed for first attempt
	$_SESSION['attempts'] = $attempts;
	buildPage($attempts);
};
function buildPage($att)
{
	echo "<body>
		 <form class = 'border' action = 'loginScreen.php' method = 'post'>
		 <h1>Login</h1>
		 <h2>Attempt Number: $att </h2>
		 <label for = 'loginName'>Login Name</label>
		 <input type = 'text' name = 'loginName' id = 'loginName' autocomplete = 'off' >
		 <br><br>
		 <label for = 'password'>Password &nbsp &nbsp</label>
		 <input type = 'password' name = 'passWord' id = 'passWord' >
		 <br><br>
		 <input type = 'submit' value = 'Login'> 
		 <input type='reset' value='Reset'>
		 </form> </body>";	  
}
mysqli_close($con);
?>