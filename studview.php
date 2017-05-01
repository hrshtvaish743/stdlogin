<?php
session_start();
if( !isset( $_SESSION['usernamet'] ) ) 
{
	header('Location: LoginNew.php');
}
?>
<html>
	<head>
		<?php		
			$teach =  $_SESSION['usernamet'];
			$n=new MongoClient();
			$db=$n->test;
			$collect=$db->teacherinfo;
			$condit = array( "_id" =>1, "teacherid" => 1,"name" => 1, "username" => 1, "password" => 1 ,"class" => 1, "subject" => 1 );
			$curs=$collect->find()->sort($condit);
			foreach($curs as $datas) 
			{
				if($datas['username']==$teach)
				{
					$cls=$datas['class'];
				}
			}
			
			$m = new MongoClient();
			$db = $m->test;
			$collection = $db->studinfo;
			$condition = array( "_id" =>1, "rollno" => 1,"username" => 1,"class"=>1,"s1p"=>1,"s1t"=>1,"s2p"=>1,"s2t"=>1,"s3p"=>1,"s3t"=>1,"s4p"=>1,"s4t"=>1,"s5p"=>1,"s5t"=>1,'date'=>1);
		?>
	 	 <style>
			table 
			{
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 80%;
			}

			td, th 
			{
				border: 1px solid #dddddd;
				padding: 4px;
			}

			tr:nth-child(even) 
			{
				background-color: #dddddd;
			}
			
			ul 
			{
			display: inline-block;
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #ff9933;
			}
			
			li 
			{
				float: left;
			}
			li a 
			{
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
			
			li a, .dropbtn 
			{
				display: inline-block;
				color: black;
				text-align: center;
				font-size:22px;
				padding: 16px 80px;
				text-decoration: none;
			}

			li a:hover, .dropdown:hover .dropbtn 
			{
				background-color: #ffcc66;
			}

			li.dropdown 
			{
				display: inline-block;
			}

			.dropdown-content 
			{
				display: none;
				position: absolute;
				background-color: #ffcc66;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			}

			.dropdown-content a 
			{
				color: black;
				font-size:22px;
				padding: 16px 71px;
				text-decoration: none;
				display: block;
				text-align: left;
			}

			.dropdown-content a:hover {background-color: #f1f1f1}

			.dropdown:hover .dropdown-content 
			{
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
			  <li><a class="active" href="teacher.php">Home</a></li>
			  <li><a href="studattend.php">Insert</a>
				<li><a href="studview.php">Display</a></li>
				<li><a href="LoginNew.php">Logout</a></li>
				</div>
			  </li>
			<center>
			<h1>Student Attendence</h1>
			<table border="1">
				<tr><td>Sr no</td>
				<td>rollno</td>
				<td>Name</td>
				<td><?php if($cls=="TE"){echo "CNT P";}	if($cls=="SE"){echo "CA P";} if($cls=="BE"){echo "SMD P";} ?></td>
				
				<td><?php if($cls=="TE"){echo "CNT T";}	if($cls=="SE"){echo "CA T";} if($cls=="BE"){echo "SMD T";} ?></td>
				
				<td><?php if($cls=="TE"){echo "DMS P";} if($cls=="SE"){echo "FDS P";} if($cls=="BE"){echo "ML P";} ?></td>
				
				<td><?php if($cls=="TE"){echo "DMS T";} if($cls=="SE"){echo "FDS T";} if($cls=="BE"){echo "ML T";} ?></td>
				
				<td><?php if($cls=="TE"){echo "ESD P";} if($cls=="SE"){echo "DS P";} if($cls=="BE"){echo "ICS P";} ?></td>
				
				<td><?php if($cls=="TE"){echo "ESD T";} if($cls=="SE"){echo "DS T";} if($cls=="BE"){echo "ICS T";} ?></td>
				
				<td><?php if($cls=="TE"){echo "SE P";} if($cls=="SE"){echo "DELD P";} if($cls=="BE"){echo "CC P";} ?></td>
				
				<td><?php if($cls=="TE"){echo "SE T";} if($cls=="SE"){echo "DELD T";} if($cls=="BE"){echo "CC T";} ?></td>
				
				<td><?php if($cls=="TE"){echo "TOC P";} if($cls=="SE"){echo "PSOOP T";} if($cls=="BE"){echo "BI T";} ?></td>
				
				<td><?php if($cls=="TE"){echo "TOC T";} if($cls=="SE"){echo "PSOOP P";} if($cls=="BE"){echo "BI P";} ?></td>
				</tr>
				<?php
				$i = 1;
				$cursor=$collection->find()->sort($condition);
				$mada=0;
				foreach ($cursor as $data) 
				{
					
					if(($data['class'])==$cls)
					{
						if(($data['date'])>$mada)
						{
							$mada=$data['date'];
						}
					}							
				}
				foreach ($cursor as $data) 
				{
					if(($data['class'])==$cls)
					{
					if(($data['date'])==$mada)
					{
						
				?>
				<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $data['rollno'] ?></td>
				<td><?php echo $data['username'] ?></td>
				<td><?php echo $data['s1p'] ?></td>
				<td><?php echo $data['s1t'] ?></td>
				<td><?php echo $data['s2p'] ?></td>
				<td><?php echo $data['s2t'] ?></td>
				<td><?php echo $data['s3p'] ?></td>
				<td><?php echo $data['s3t'] ?></td>
				<td><?php echo $data['s4p'] ?></td>
				<td><?php echo $data['s4t'] ?></td>
				<td><?php echo $data['s5p'] ?></td>
				<td><?php echo $data['s5t'] ?></td>
				</tr>
				<?php
						$i++;
					}}
				}
				?>		
			</table>
			</center>
		</form>
	</body>
</html>
