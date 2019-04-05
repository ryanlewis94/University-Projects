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


include("connect.php");


  $propid=$_POST['PropertyID'];
  $propno=$_POST["PropertyNo"];
  $propstreet=$_POST["PropertyStreet"];
 
  $query = $conn->prepare('UPDATE property SET propertyNo = :PropertyNo, propertyStreet = :PropertyStreet WHERE propertyID =:PropertyID');
  $query ->execute(array(
    ':PropertyNo' =>$propno,
	':PropertyStreet' =>$propstreet,
	':PropertyID' =>$propid
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
<a href="property.php">Back to Property Page</a><br>

</div>
    
</div>
</body>
</html>
