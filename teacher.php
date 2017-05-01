<?php
session_start();
if( !isset( $_SESSION['usernamet'] ) ) 
{
	header('Location: LoginNew.php');
}
?>
<html>
	<head>
	<title>Attendence Portal</title>
		<style>
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
			  <li><a class="active" href="teacher.php">Home</a></li>
			  <li><a href="studattend.php">Insert</a>
				<li><a href="studview.php">Display</a></li>
				<li><a href="Logout.php">Logout</a></li>
				</div>
			  </li>
			</ul><center>
			<h1>Welcome</h1><h2>To</h2><h1>MITAOE<br>Attendancence Portal</h1>
			</center>
	</body>
</html>

