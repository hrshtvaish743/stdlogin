<?php
session_start();
if( !isset( $_SESSION['usernamea'] ) ) 
{
	header('Location: LoginNew.php');
}
	if( !empty($_GET['id']) ) {
	
	$id = $_GET['id'];
	$t=$_GET['t'];
     $n=$_GET['n'];
      $u=$_GET['u'];
	$p=$_GET['p'];
	$c=$_GET['c'];
	$s=$_GET['s'];
	$record=array(
			'teacherid'=>$t,
			'name'=>$n,
			'username'=>$u,
			'password'=>$p,			
			'class'=>$c,
			'subject'=>$s
			);
				
	print_r($record);
	$condition = array( "_id" => new MongoId($id) );
		
	$m=new MongoClient();
	$db=$m->test;
	$collection=$db->teacherinfo;
	$status=$collection->remove($condition);
	
	print_r($status);
	
	if ( $status['n'] > 0 ) {
		header('Location: teachrecord.php?id='.$id);
	} else {
		echo "error";
	}
	
}
?>