<?php
	session_start();
	if( !isset( $_SESSION['usernamea'] ) ) 
	{
		header('Location: LoginNew.php');
	}
	$m = new MongoClient();
	$db = $m->test;
	$collection = $db->studinfo;
	$condition = array("rollno" => 1,"name" => 1,"username" => 1,"class" => 1,"s1p"=>1,"s1t"=>1,"s2p"=>1,"s2t"=>1,"s3p"=>1,"s3t"=>1,"s4p"=>1,"s4t"=>1,"s5p"=>1,"s5t"=>1,'date'=>1 );
?>
<html>
	<head>
		<style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 80%;
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
				<span style="font-size:50px; letter-spacing:1px; line-height:1.2em; color:#000"> Computer Science Engineering </span>
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
				
				<li><a href="LoginNew.php">Logout</a></li>
				</li>
			</ul>
			<center>
            <h1>Defaulters</H1>
			<table border="1">
				<tr><td>Sr no</td>
				<td>Roll no.</td>
				<td>Name</td>
		        <td>Class</td>
				<td>Attendance</td>
				</tr>
				<?php
				$i = 1;
				$cursor=$collection->find()->sort($condition);
				foreach ($cursor as $data) 
				{
					$mada=0;

						if(($data['date'])>$mada)
						{
								$mada=$data['date'];
						}	
					
				}
				foreach ($cursor as $data) 
				{
					if(($data['date'])==$mada)
					{
						$att=number_format((($data['s1p']+$data['s2p']+$data['s3p']+$data['s4p']+$data['s5p'])/($data['s1t']+$data['s2t']+$data['s3t']+$data['s4t']+$data['s5t']))*100);
						if($att<75)
					{
				?>
				<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $data['rollno'] ?></td>
				<td><?php echo $data['username'] ?></td>
			    <td><?php echo $data['class'] ?></td>
				<td><?php echo $att ?></td>
				<td><a href="studdelete.php?id=<?php echo $data['_id'] ?>">Delete</a>
				</tr>
				<?php
					$i++;
				}}}
				?>		
			</table>
		</center>
		</form>
	</body>
</html>