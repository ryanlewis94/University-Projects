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


$occid=$_POST['OccupancyID'];
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
 
  $query = $conn->prepare('UPDATE occupancy SET propertyID = :PropertyID,customerID = :CustomerID,occupancyStart = :OccupancyStart,occupancyEnd = :OccupancyEnd WHERE occupancyID =:OccupancyID');
  $query ->execute(array(
    ':PropertyID' =>$propid,
	':CustomerID' =>$cusid,
	':OccupancyStart' =>$startdate,
	':OccupancyEnd' =>$enddate,
	':OccupancyID' =>$occid
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
<a href="occupancy.php">Back to Occupancy Page</a><br>

</div>
    
</div>
</body>
</html>
