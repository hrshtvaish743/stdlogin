<?php
session_start();
if( !isset( $_SESSION['usernamea'] ) ) 
{
	header('Location: LoginNew.php');
}
	$t=$_POST['t'];
     $n=$_POST['n'];
     $u=$_POST['u'];
     $p=$_POST['p'];
     $c=$_POST['c'];
     $s=$_POST['s'];
     $m=new MongoClient();
     $db=$m->test;
     $collection=$db->teacherinfo;
     $arr=array('teacherid'=>$t, 'name'=>$n,'username'=>$u,'password'=>$p,'class'=>$c,'subject'=>$s);
     if($collection->insert($arr))
     {
    header('location:teachrecord.php');
      } 
     else
      {
     echo "Not inserted";
       }  
?>