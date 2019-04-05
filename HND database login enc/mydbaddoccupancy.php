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

$propid= $_POST['PropertyID'];
$cusid= $_POST['CustomerID'];
$startday= $_POST['StartDay'];
$startmonth= $_POST['StartMonth'];
$startyear= $_POST['StartYear'];
$endday= $_POST['EndDay'];
$endmonth= $_POST['EndMonth'];
$endyear= $_POST['EndYear'];

$startdate = $startyear.$startmonth.$startday;
if ($endday == 0){
	$enddate = NULL;
}
else {
	$enddate = $endyear.$endmonth.$endday;
}

include("connect.php");

try { 
  
$query = $conn->prepare('INSERT INTO occupancy(propertyID, customerID, occupancyStart, occupancyEnd)
VALUES(:propertyid,:customerid,:occupancystart,:occupancyend)');

	$query ->execute(array(
	':propertyid' =>$propid,
	':customerid' =>$cusid,
	':occupancystart' =>$startdate,
	':occupancyend' =>$enddate)
		);
		
	echo "Added successfully";

	$conn = null;
}

catch(PDOException $e) {
   echo die ('Error Message: '. $e->getMessage());
   }
?>

<br>
<a href="occupancy.php">Back to Occupancy Page</a>

 </div>
    
</div>
</body>
</html>