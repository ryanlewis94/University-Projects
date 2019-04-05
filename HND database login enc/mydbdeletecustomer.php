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

$custid= $_POST["CustomerID"];

  echo $custid;

include("connect.php");


    $query = $conn->prepare('DELETE FROM customer WHERE customerID= :id');
    $query ->bindParam(':id', $custid); 
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

<a href="customer.php">Back to Customer Page</a><br>

</div>
    
</div>
</body>
</html>