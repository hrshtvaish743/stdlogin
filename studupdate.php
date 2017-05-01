<?php

session_start();

if( !isset( $_SESSION['usernamea'] ) ) 
{

	header('Location: LoginNew.php');

}
	
if( !empty($_GET['id']) )
 {
	

	$id = $_GET['id'];

	$ro=$_GET['ro'];

	$n=$_GET['n'];

	$u=$_GET['u'];

	$p=$_GET['p'];

	$c=$_GET['c'];

	$b=$_GET['b'];

	$record=array(
'rollno'=>$ro,'name'=>$n,'username'=>$u,'password'=>$p,'class'=>$c,'batch'=>$b,);

			
	print_r($record);

	$condition = array( "_id" => new MongoId($id) );

		
	$m=new MongoClient();

	$db=$m->test;

	$collection=$db->users;

	$status=$collection->update($condition,$record);

	
	print_r($status);

	
	if ( $status['n'] > 0 ) {

		header('Location: studrecord.php?id='.$id);

	} else {

		echo "error";
	
}

}

?>