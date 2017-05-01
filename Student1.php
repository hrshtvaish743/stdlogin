<?php
session_start();
if( !isset( $_SESSION['usernames'] ) ) 
{
	header('Location: LoginNew.php');
}
	$u= $_SESSION['usernames'];
	$m = new MongoClient();
	$db = $m->test;
	$collection = $db->users;
	$condition = array( "_id" =>1, "rollno" => 1,"name" => 1,"username" => 1,"password" => 1 , "class" => 1);
			 
	$n = new MongoClient();
	$db = $n->test;
	$collect = $db->studinfo;
	$cond = array( "_id" =>1,"username" => 1,"s1p"=>1,"s1t"=>1,"s2p"=>1,"s2t"=>1
			 ,"s3p"=>1,"s3t"=>1,"s4p"=>1,"s4t"=>1,"s5p"=>1,"s5t"=>1,'date'=>1);		 
?>
<html>
	<head>
		<title>Attendence Portal</title>	
		<style>
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 80%;
			}

			td, th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 4px;
			}

			tr:nth-child(even) {
				background-color: #dddddd;
			}

			.button {
				background-color: #dddddd ;
				border-radius: 12px;
				border: none;
				padding: 15px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				cursor: pointer;
				-webkit-transition-duration: 0.4s; /* Safari */
				transition-duration: 0.4s;
			}

			.button1 {
				box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
			}
		</style>
	</head>
	<body>
		<div>
		<img id="logo" src="./picture/logo.png" alt="Vellore Institute of Technology"  style="width:175px;height:33px;">
		<div>     
		<center>
		<span style="color:#00366C; font-size:30px; display:block; letter-spacing:2px;"> Department of</span>
		<span style="font-size:50px; letter-spacing:1px; line-height:1.2em; color:#000"> Computer Science Engineering  </span></center>
		<hr>     
		</div>
		</div>
		<center>
		<table border="0">
			<?php
				$i = 1;
				$cursor=$collection->find()->sort($condition);
				
				foreach($cursor as $data) 
				{
					

					if($data['username']==$u)
					{
						$c=$data['class'];	
			?>
			<tr>
			<td><b>Username</b></td>
			<td><b><?php echo $data['username'] ?></b></td>
			</tr>
			
			<tr>
			<td><b>Name of Student</b></td>
			<td><b><?php echo $data['name'] ?></b></td>
			</tr>
			
			<tr>
			<td><b>Roll No.</b></td>
			<td><b><?php echo $data['rollno'] ?></b></td>
			</tr>
			<?php
					}
				}
			?>
			<?php
				$j = 1;
				$curs=$collect->find()->sort($cond);
				$mada=0;
				foreach($curs as $datas) 
				{
					if($datas['username']==$u)
					{
						
						if(($datas['date'])>$mada)
						{
								$mada=$datas['date'];
						}
					}
				}
				foreach($curs as $datas) 
				{
					if(($datas['username']==$u)&&(($datas['date'])==$mada))
					{
			?>
			<tr>
			<td><b>Attedance</b></td>
			<td><b><?php echo number_format((($datas['s1p']+$datas['s2p']+$datas['s3p']+$datas['s4p']+$datas['s5p'])/($datas['s1t']+$datas['s2t']+$datas['s3t']+$datas['s4t']+$datas['s5t']))*100)."%" ?></b></td>
			</tr>

		</table>
		<hr>
		
		<table >
					
			<tr>
			<th>Sr No.</th>
			<th>Subject</th>
			<th>Present</th>
			<th>Total</th>
			<th>Percentage</th>
			</tr>

			<tr>
			<td>1</td>
			<td><?php if($c=="TE"){echo "Computer Network Technology";}	if($c=="SE"){echo "Computer Architecture";} if($c=="BE"){echo "System Modeling and Design";}			?></td>
			<td><?php echo $datas['s1p'] ?></td>
			<td><?php echo $datas['s1t'] ?></td>
			<td><?php echo number_format(($datas['s1p']/$datas['s1t'])*100)."%" ?></td>
			</tr>
			
			<tr>
			<td>2</td>
			<td><?php if($c=="TE"){echo "Database Management System";} if($c=="SE"){echo "Fundament of Datastructure";} if($c=="BE"){echo "Machine Learning";} ?></td>
			<td><?php echo $datas['s2p'] ?></td>
			<td><?php echo $datas['s2t'] ?></td>
			<td><?php echo number_format(($datas['s2p']/$datas['s2t'])*100)."%" ?></td>
			</tr>
			
			<tr>
			<td>3</td>
			<td><?php if($c=="TE"){echo "Employability Skill Development";} if($c=="SE"){echo "Discrete Structure";} if($c=="BE"){echo "Information Cyber Security";} ?></td>
			<td><?php echo $datas['s3p'] ?></td>
			<td><?php echo $datas['s3t'] ?></td>
			<td><?php echo number_format(($datas['s3p']/$datas['s3t'])*100)."%" ?></td>
			</tr>
			
			<tr>
			<td>4</td>
			<td><?php if($c=="TE"){echo "Software Engineering";} if($c=="SE"){echo "Digital Electronics and Logic Design";} if($c=="BE"){echo "Cloud Computing";} ?></td>
			<td><?php echo $datas['s4p'] ?></td>
			<td><?php echo $datas['s4t'] ?></td>
			<td><?php echo number_format(($datas['s4p']/$datas['s4t'])*100)."%" ?></td>
			</tr>
			
			<tr>
			<td>5</td>
			<td><?php if($c=="TE"){echo "Theory of Computation";} if($c=="SE"){echo "Problem Solving and Object Oriented Programing";} if($c=="BE"){echo "Business Intelligence";} ?></td>
			<td><?php echo $datas['s5p'] ?></td>
			<td><?php echo $datas['s5t'] ?></td>
			<td><?php echo number_format(($datas['s5p']/$datas['s5t'])*100)."%" ?></td>
			</tr>
		</table>
			<?php
					}
				}
			?>
		<button class="button button1"><a href="Logout.php">Logout</a></button>
	</body>
</html>