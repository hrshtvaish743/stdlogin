<?php

session_start();
if( !isset( $_SESSION['usernamet'] ) ) 
{
	header('Location: LoginNew.php');
}

$f = false;

if( !empty( $_POST['search'] ) ) 
{
	
	$f = true;
	$search = "/^".trim( $_POST['search'] ).".*/";
	$search = new MongoRegex( $search );
	$condtion = array(
		'$or' => array(array('date' => $search )
		)
	);
	echo $search;
	$sort = array("rollno" => 1,"username" => 1,'class'=>1,'date'=>1);
	
	$m = new MongoClient();
	$db = $m->test;
	$collection = $db->studinfo;
	
	$i=1;
	$cursor = $collection->find( $condtion )->sort( $sort );
}
?>

<html>
<head>
	 <style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 60%;
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
			  <li><a class="active" href="admin.html">Home</a></li>
			  <li class="dropdown">
				<a href="admin.html" class="dropbtn">Insert</a>
				<div class="dropdown-content">
				  <a href="studreg.php">Student</a>
				  <a href="teachreg.php">Teacher</a>
				</li>
				<li class="dropdown">
				<a href="admin.html" class="dropbtn">Display</a>
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
<center>

<h1>Student Record</h1>
<form action="studsdate.php" method="post" >

    <table cellpadding="4">
        <tr>
        	<td>Date</td>
            <td><input type="text" name="search" required="required" value="<?php echo ($f)?$_POST['search']:"" ?>" /></td>
            <td><input type="submit" value="Search" /></td>
        </tr>
    </table>
</form>
<table >
<tr><td>Sr no</td>
				<td>Roll no.</td>
				<td>Name</td>
				<td>Class</td>
				</tr>
<?php

if( $f && $cursor->count()>0 ) 
{
	foreach( $cursor as $row ) 
	{
		
?>
	<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row['rollno'] ?></td>
				<td><?php echo $row['username'] ?></td>
				<td><?php echo $row['class'] ?></td>		
				</tr>
<?php
	$i++;
	}
} 
else 
{	
	echo "<tr align='center'><td colspan='6'>No Data Searched</td></tr>";
}
?>		
</table>
</center>
</form>
</body>
</html>
