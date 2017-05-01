<?php
	session_start();
	if( !isset( $_SESSION['usernamea'] ) ) 
	{
		header('Location: LoginNew.php');
	}
	$ro=$_POST['ro'];
    $n=$_POST['n'];
    $u=$_POST['u'];
    $p=$_POST['p'];
    $c=$_POST['c'];
	
    $m=new MongoClient();
    $db=$m->test;
    $collection=$db->users;
    $arr=array('rollno'=>$ro, 'name'=>$n,'username'=>$u,'password'=>$p,'class'=>$c);
	
	$n=new MongoClient();
    $db=$n->test;
    $collect=$db->studinfo;
	
	$condition = array( "class" => 1,'date'=>1);
	$cursor=$collect->find()->sort($condition);
	foreach ($cursor as $data) 
	{
		$mada=0;
		if(($data['class'])==$c)
		{
			if(($data['date'])>$mada)
			{
					$mada=$data['date'];
			}	
		}
	}

	$arra=array("rollno" => $ro,"username" => $u,"class" => $c,"s1p"=> 0,"s1t"=> 0,"s2p"=> 0,"s2t"=> 0,"s3p"=> 0,"s3t"=> 0,"s4p"=> 0,"s4t"=> 0,"s5p"=> 0,"s5t"=> 0,"date"=> $mada);
	
	if(($collection->insert($arr))&&($collect->insert($arra)))
	{
		header('location:studrecord.php');
	} 
	else
	{
		echo "Not inserted";
	}  
?>