<?php
include ("sessionstart.php");
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

$propno= $_POST['PropertyNo'];
$propstreet= $_POST['PropertyStreet'];


include("connect.php");

try { 
  
$query = $conn->prepare('INSERT INTO property(propertyNo, propertyStreet)
VALUES(:propertyno,:propertystreet)');

	$query ->execute(array(
	':propertyno' =>$propno,
	':propertystreet' =>$propstreet)
		);
		
	echo "Added successfully";

	$conn = null;
}

catch(PDOException $e) {
   echo die ('Error Message: '. $e->getMessage());
   }
?>

<br>
<a href="property.php">Back to Property Page</a>

 </div>
    
</div>
</body>
</html>