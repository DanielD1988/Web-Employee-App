<!--
	Student Name: Daniel Dinelli 
	Student Number: C00242741
	Purpose: Used to change old password to new password
	Date: 16th March 2020
-->		
<style>
	.border/*Used for putting styling on the login and the welcome message*/
	{
		text-align: center;
		border-style: solid;
		width: 40%;
		height: 210px;
		position: relative;
		top: 100px;
		left: 450px;
		font-weight: bold;
		background-color: rgb(119,136,153);/*Dark grey*/
	}
	.button
	{
		text-align: center;
		position: relative;
		top: 110px;
		font-weight: bold;
	}
	.message/*Used for putting the error message below the login border and makes the font of the message bold*/
	{
		position: relative;
		top: 100px;
		left: 650px;
		font-size: 20px;
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
	.message3/*Used for return to main menu button*/
	{
		position: absolute;
		top: 230px;
		left: 670px;
		font-size: 20px;
		font-weight: bold;
	}
	.returnButton
	{
		
	}
</style>
<?php
include 'db.inc.php';
session_start();

if(isset($_SESSION['user']))
{
		if(isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['confirmPass']))
			{
				$old = $_POST['oldPass'];
				$new = $_POST['newPass'];
				$confirm = $_POST['confirmPass'];
				
				$user = $_SESSION['user'];
				
				$sql = "SELECT * FROM EmployeeApp WHERE loginName = '$user' AND password = '$_POST[oldPass]'";
				
				if(!mysqli_query($con,$sql))
				{
					echo "Error in select query " . mysqli_error($con);
				}
				else
				{
					if(mysqli_affected_rows($con) == 0)
					{
						buildPage($old,$new,$confirm);
						echo "<div class = 'message'>Old password incorrect!</div>";
					}
					else
					{
						if($_POST['newPass'] != $_POST['confirmPass'])
						{
							buildPage($old,$new,$confirm);
							echo "<div class = 'message'>New passwords do not match</div>";
						}
						else if($_POST['newPass'] == $_POST['oldPass'])
						{
							buildPage($old,$new,$confirm);
							echo "<div class = 'message'>New password cannot be the same as old password</div>";
						}
						else
						{
							$sql = "UPDATE EmployeeApp SET password = '$_POST[newPass]' WHERE loginName = '$user'";
							if(!mysqli_query($con,$sql))
							{
								echo "Error in update query " . mysqli_error($con);
							}
							else
							{
								if(mysqli_affected_rows($con) == 0)
								{
									buildPage($old,$new,$confirm);
									echo "<div class = 'message2'>No changes made!</div>";
								}
								else
								{
									echo "<div class = 'message2'> Congratulations your password has been updated!<br></div>
										<div class = 'message3'><h3><input type = 'button' value = 'Return to Main Menu' onclick = 'window.location = \"mainMenu.php\"'></h3></div>";
								}
							}
						}
					}
				}	
			}
			else
			{
				//building page for inital display
				buildPage("","","");
			}	
}
else
{
	echo '<div class = "message2">You must be logged in to view this page </div>';
}
function buildPage($o,$n,$c)
{
	echo "<body>
		 <form class = 'border' action = 'changePassword.php' method = 'post'>
		 <h3>Change Password</h3>
		 <label for 'oldPass'>Old Password &nbsp &nbsp &nbsp </label>
		 <input type = 'password' name = 'oldPass' id = 'oldPass' autocomplete = 'off' value = $o >
		 <br><br>
		 <label for 'newPass'>New Password &nbsp &nbsp &nbsp </label>
		 <input type = 'password' name = 'newPass' id = 'newPass' autocomplete = 'off' value = $n >
		 <br><br>
		 <label for 'confirmPass'>Confirm Password</label>
		 <input type = 'password' name = 'confirmPass' id = 'confirmPass' autocomplete = 'off' value = $c >
		 <br><br>
		 <input type = 'submit' value = 'Submit'>
		 </form>
		  <form class = 'button' action = 'mainMenu.php'>
				 <input type = 'submit' value = 'Return to Main Menu'>
			 </form>";
}	
mysqli_close($con);
?>