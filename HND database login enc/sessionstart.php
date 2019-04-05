<?php
session_start();

if(isset($_SESSION['checkuserid']))
{
	//do nothing
}
else 
{
	header ("location:main_login.php");
}
?>