<?php
session_start();
if( !isset( $_SESSION['usernamea'] ) ) 
{
	header('Location: LoginNew.php');
}
?>
<html>
     <head>
     <Title>Teacher Registration form </title>
	 <style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 40%;
			}

			td, th {
				border: 1px solid #dddddd;
				padding: 4px;
			}

			tr:nth-child(even) {
				background-color: #dddddd;
			}
			ul {
			display: inline-block;
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #ff9933;
		}
		li {
			float: left;
		}
		li a {
			display: block;
			color: black;
			text-align: center;
			font-size:22px;
			padding: 16px 80px;
			text-decoration: none;
		}
		li a:hover {
			background-color: #ffcc66;
		}
		
		
		li a, .dropbtn {
			display: inline-block;
			color: black;
			text-align: center;
			font-size:22px;
			padding: 16px 80px;
			text-decoration: none;
		}

		li a:hover, .dropdown:hover .dropbtn {
			background-color: #ffcc66;
		}

		li.dropdown {
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #ffcc66;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}

		.dropdown-content a {
			color: black;
			font-size:22px;
			padding: 16px 71px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.dropdown-content a:hover {background-color: #f1f1f1}

		.dropdown:hover .dropdown-content {
			display: block;
		}
		</style>
     </head>
	 <body>
	 		<div>
			<img id="logo" src="./picture/logo.png" alt="Vellore Institute of Technology"  style="width:175px;height:33px;">
			<div>     
			<center>
				<span style="color:#00366C; font-size:30px; display:block; letter-spacing:2px;"> Department of</span>
				<span style="font-size:50px; letter-spacing:1px; line-height:1.2em; color:#000"> Computer Science Engineering  </span>
			</center>
			<hr>     
			</div>
			<center>
			<ul>
			  <li><a class="active" href="admin.php">Home</a></li>
			  <li class="dropdown">
				<a class="dropbtn">Insert</a>
				<div class="dropdown-content">
				  <a href="studreg.php">Student</a>
				  <a href="teachreg.php">Teacher</a>
				</li>
				<li class="dropdown">
				<a class="dropbtn">Display</a>
				<div class="dropdown-content">
				  <a href="studrecord.php">Student</a>
				  <a href="teachrecord.php">Teacher</a>
				  </li>
				<li class="dropdown">
				<a class="dropbtn">Search</a>
				<div class="dropdown-content">
				  <a href="studsearch.php">Student</a>
				  <a href="teachsearch.php">Teacher</a>
				  </li>		  
					<li><a  href="defaulter.php">Defaulter</a></li>
				<li><a href="Logout.php">Logout</a></li>

			  </li>
			</ul>
			</center>
		<form action="teachadd.php" method="POST">
			<center>
			<table border="1">
                 <h1>Teachers Registration</H1>
                 <tr><td>Teacher ID</td><td><input type="text" name=t required></td></tr>
                 <tr><td>Name</td><td><input type="text" name=n required></td></tr>
                 <tr><td>User name</td><td><input type="text" name="u" required></td></tr>
                 <tr><td>Password</td><td><input type="text" name="p" required></td></tr>
                 <tr><td>Class</td>
				<td>
				<Select name="c"required>
					<option selected="true">Select</option>
					<option value="SE" >SE</option>
					<option value="TE" >TE</option>
				<option value="BE" >BE</option>
				</td>
				</tr>
                 <tr><td>Subject</td><td><input type="text" name=s required></td></tr>
                 <tr  align=center><td colspan=2><input  type=submit  value=Submit></td></tr>
           </table>
        </center>
		</form>      
	 </body>	 
</html>

