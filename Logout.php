<?php

session_start();

if( isset( $_SESSION['usernames'] ) ) 
{
	unset( $_SESSION['usernames'] );
}

if( isset( $_SESSION['usernamet'] ) ) 
{
	unset( $_SESSION['usernamet'] );
}

if( isset( $_SESSION['usernamea'] ) ) 
{
	unset( $_SESSION['usernamea'] );
}

header('Location: Loginnew.php');

?>