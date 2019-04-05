<?php
session_start();
?>

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

$userno= $_POST["UserNo"];

  echo $userno;

include("connect_user.php");


    $query = $conn->prepare('DELETE FROM '.$table.' WHERE UserNo= :id');
    $query ->bindParam(':id', $userno); 
    $query ->execute();

  //echo $query ->rowCount();
    if ($query ->rowCount() >= 1) {
       print ' was deleted successfully.';
      } 
    if ($query ->rowCount() <1) {
       echo ' was not deleted.';
      }

$conn = null; 
?>

<br>

<a href="teamManager.php">Back to Team Page</a><br>

</div>
    
</div>
</body>
</html>