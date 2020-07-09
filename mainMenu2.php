<!--
	Student Name: Daniel Dinelli
	Student Number: C00242741
	Date: 15th March 2020	
	Purpose: A simple navagation bar for other screens
-->
<!DOCTYPE html>
<html>
	<head>
	<DIV ALIGN=CENTER>
		<meta charset="UTF-8">
		<title>Main Menu </title>
		<style> 

		ul {   /*NAV BAR*/
		  display: inline-block;    /* inline element you can apply height and width values*/
		  list-style-type: none;    /*No bullet points*/
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: rgb(40,40,40);/*Dark Grey*/
		  text-align:center;
		  font-family: Arial, Helvetica, sans-serif;
		}
		li {
			float: left;
		}
		li a, .dropbtn {
		  display: block;
		  color: #f9f9f9; /*white*/
		  font-style:bold;
		  font-size:20px;
		  text-align: center;
		  padding: 20px 60px;
		  text-decoration: none;
		  display: inline-block;
		}
		li a:hover, .dropdown:hover .dropbtn { /*dropdown hover options*/
			background-color: rgb(128,128,128); /* grey*/
			color:white;  /*text*/
			}
		li.dropdown {
		  display: inline-block;
		}
		.dropdown-content {
				  display: none;
				  position: absolute;
				  background-color: rgb(176,176,176); /*background of dropdown menu - dark grey*/
				  min-width: 160px;
				  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				  z-index: 1;
		}

		.dropdown-content a {
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none; /*options such as underline */
		  display: block;
		  text-align: left;
		}

		.dropdown-content a:hover {
		background-color:rgb(128,128,128); /* grey*/
		}

		.dropdown:hover .dropdown-content {
			display: block;   /*dropdown content text before cursor hovers*/
		}
		
		li a:hover:not(.active){ /*dropdown option not active*/
		background-color:rgb(128,128,128); /* grey*/
		  color:white;   /*dropdown content text when cursor hovers over*/
		 
		}
		
		li a.active { /*dropdowncontent options that are active*/
		background-color: rgb(190,190,190); /* grey*/
		  color:white;
		}
		</style>
	</head>
	<body bgcolor = "#A8A8A8">
	<div>
		<ul>
			</li class="dropdown">
			<li>
				<a href="mainMenu.php" class="dropbtn">Main Menu</a>
			</li>
			<li class="dropdown">
				<a href="#" class="dropbtn">File Maintenance</a>
			<div class="dropdown-content">
				<a href="addEmployee.php">Add Employee</a>
				<a href="deleteEmployeeForm.php">Delete Employee</a>
			</div>
			</li>
			<li class="dropdown">
				<a href="#" class="dropbtn">Reports</a>
			<div class="dropdown-content">
				<a href="employeeReport.php">All Employees</a>
				<a href="selectEmployee.php">Employee/Login Report</a>
			</div>
			</li>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Admin</a>
			<div class="dropdown-content">
				<a href="changePassword.php">Change Password</a>
			</div>
			</li class="dropdown">
			<li>
				<a href="logout.php" class="dropbtn">Logout</a>
			</li>
		</ul>
	</div>	
	</body>
</html>	