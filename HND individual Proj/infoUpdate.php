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


include("connect_user.php");


  $UserNo=$_SESSION['userno'];
  $UserName=$_POST["UserName"];
  $UserPassword=$_POST["Password"];
  $ForName=$_POST["ForName"];
  $SurName=$_POST["SurName"];
  $Position=$_POST["Position"];
 
  $query = $conn->prepare('UPDATE user SET UserName = :UserName,UserPassword = :Password,ForName = :ForName,SurName = :SurName,Position = :Position WHERE UserNo =:UserNo');
  $query ->execute(array(
    ':UserName' =>$UserName,
    ':Password' =>$UserPassword,
    ':ForName' =>$ForName,
	':SurName' =>$SurName,
	':Position' =>$Position,
	':UserNo' =>$UserNo
    ));
     
	 if ($query ->rowCount() >= 1) {
       print 'Your Information has been updated';
      } 
    if ($query ->rowCount() <1) {
       echo 'Your Information has not been updated.';
      }
	 
$conn = null;
?> 

<br>
<br>
<a href="teamPlayer.php">Back to Team Page</a><br>

</div>
    
</div>
</body>
</html>
