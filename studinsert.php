<?php
session_start();
if( !isset( $_SESSION['usernamet'] ) ) 
{
	header('Location: LoginNew.php');
}

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
			$sub=$datas['subject'];
		}
	}

	$y = $_POST['pr']; 
	$date = $_POST['da']; 
	$p=explode(",",$y);
	$count=sizeof($p);
	$i=0;
    $m=new MongoClient();
    $db=$m->test;
    $collection=$db->studinfo;
	$condition = array( "_id" =>1, "rollno" => 1,"name" => 1,"username" => 1,"class" => 1,"s1p"=>1,"s1t"=>1,"s2p"=>1,"s2t"=>1
	 ,"s3p"=>1,"s3t"=>1,"s4p"=>1,"s4t"=>1,"s5p"=>1,"s5t"=>1,'date'=>1);
	$cursor=$collection->find()->sort($condition);
	foreach ($cursor as $data) 
	{
		$mada=0;
		if(($data['class'])==$cls)
		{
			if(($data['date'])>$mada)
			{
					$mada=$data['date'];
			}	
		}		
	}
	 if($i<$count)
		{
			foreach($cursor as $data) 
			{
				if(($data['class'])==$cls)
		{
				if(($data['date'])==$mada)
				{
					if(($data['rollno']==$p[$i]))
					{	
						$rn=$data['rollno'];
						$un=$data['username'];
						$cl=$data['class'];
						$s1p=$data['s1p'];
						$s1t=$data['s1t'];
						$s2p=$data['s2p'];
						$s2t=$data['s2t'];
						$s3p=$data['s3p'];
						$s3t=$data['s3t'];
						$s4p=$data['s4p'];
						$s4t=$data['s4t'];
						$s5p=$data['s5p'];
						$s5t=$data['s5t'];
						if($sub=='s1')
						{
							$s1p++;
							$s1t++;
						}
						if($sub=='s2')
						{
							$s2p++;
							$s2t++;
						}
						if($sub=='s3')
						{
							$s3p++;
							$s3t++;
						}
						if($sub=='s4')
						{
							$s4p++;
							$s4t++;
						}
						if($sub=='s5')
						{
							$s5p++;
							$s5t++;
						}
						$arr=array("rollno" => $rn,"username" => $un,"class" => $cl,"s1p"=> $s1p,"s1t"=> $s1t,"s2p"=> $s2p,"s2t"=> $s2t,"s3p"=> $s3p,"s3t"=> $s3t,"s4p"=> $s4p,"s4t"=> $s4t,"s5p"=> $s5p,"s5t"=> $s5t,"date"=>$date);
						$n=new MongoClient();
						$db=$n->test;
						$collect=$db->studinfo;
						$collect->insert($arr);
						$i++;
					}
					else
					{
						$rn=$data['rollno'];
						$un=$data['username'];
						$cl=$data['class'];
						$s1p=$data['s1p'];
						$s1t=$data['s1t'];
						$s2p=$data['s2p'];
						$s2t=$data['s2t'];
						$s3p=$data['s3p'];
						$s3t=$data['s3t'];
						$s4p=$data['s4p'];
						$s4t=$data['s4t'];
						$s5p=$data['s5p'];
						$s5t=$data['s5t'];
						if($sub=='s1')
						{
							$s1t++;
						}
						if($sub=='s2')
						{
							$s2t++;
						}
						if($sub=='s3')
						{
							$s3t++;
						}
						if($sub=='s4')
						{
							$s4t++;
						}
						if($sub=='s5')
						{
							$s5t++;
						}
						$arr=array("rollno" => $rn,"username" => $un,"class" => $cl,"s1p"=> $s1p,"s1t"=> $s1t,"s2p"=> $s2p,"s2t"=> $s2t
						 ,"s3p"=> $s3p,"s3t"=> $s3t,"s4p"=> $s4p,"s4t"=> $s4t,"s5p"=> $s5p,"s5t"=> $s5t,"date"=>$date);	
						$o=new MongoClient();
						$db=$o->test;
						$collect=$db->studinfo;
						$collect->insert($arr);
					}
				}
		}
			}
		}		
	header('location:studview.php');
?>