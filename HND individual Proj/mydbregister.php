<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Confirmation</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<style>
#maincontent {
	padding-left:300px;
}
</style>
</head>

<body>
<div id="container">
  <header id="logo">
	
   </header>
  <div id="maincontent">

<?php

//PDO php Data Objects

$teamno= $_POST["TeamNo"];
$usrcode= $_POST["UserCode"];
$usrname= $_POST["UserName"];
$pass= $_POST["UserPassword"];
$frname= $_POST["ForName"];
$srname= $_POST["SurName"];
$pstn= $_POST["Position"];

include("connect_user.php");

try { 
  
$query = $conn->prepare('INSERT INTO '.$table.'(TeamNo, UserCode, UserName, UserPassword, ForName, SurName, Position)
VALUES(:TeamNo,:UserCode,:UserName,:UserPassword,:ForName,:SurName,:Position)');

	$query ->execute(array(
	':TeamNo' =>$teamno,
	':UserCode' =>$usrcode,
	':UserName' =>$usrname,
	':UserPassword' =>$pass,
	':ForName' =>$frname,
	':SurName' =>$srname,
	':Position' =>$pstn)
		);
		
	echo "Registered successfully";

	$conn = null;
}

catch(PDOException $e) {
   echo die ('Error Message: '. $e->getMessage());
   }
?>

<br>
<a href="main_login.php">Back to Login</a>

 </div>
    
</div>
</body>
</html>