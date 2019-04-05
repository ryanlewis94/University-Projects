<?php
include ("sessionstart.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
type="text/javascript"></script>

<style type="text/css">
@import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");
#customerhistorytable {
	padding-bottom:10px;
	padding-left:130px;
}

</style>
<script type="text/javascript">
function load() {
var feed ="http://open.live.bbc.co.uk/weather/feeds/en/2654755/3dayforecast.rss";
new GFdynamicFeedControl(feed, "feedControl");

}
google.load("feeds", "1");
google.setOnLoadCallback(load);
</script>
</head>

<body>
<div id="container">
  <header id="logo">
	<nav>
      <ul>
        <li><a href="customer.php">Customer</a></li>
        <li><a href="occupancy.php">Occupancy</a></li>
        <li><a href="property.php">Property</a></li>
        <li><a href="customerhistory.php">Customer History</a></li>
        <li><a href="main_login.php">Logout</a></li>
      </ul>
    </nav>
   </header>
  <div id="maincontent">
    <article id="box1">
    <h1>Customer History</h1>
    <div id="customerhistorytable">
<?php

 
 include("connect_db.php");
 
 $sql = "Select p.propertyStreet, p.propertyNo, o.occupancyStart, o.occupancyEnd, c.firstName, c.lastName
From customer c, occupancy o, property p
Where c.customerID = o.customerID
and p.propertyID = o.propertyID
ORDER BY propertyStreet, propertyNo, occupancyStart";

$result = $conn->query($sql);
		 

if ($result->num_rows > 0) {
     echo "<table><tr><th>Street</th><th>No</th><th>Start</th><th>End</th><th>First Name</th><th>Surname</th></tr>";
     while($row = $result->fetch_assoc()) {
		if ($row["occupancyEnd"] == NULL)
		{
			$startdate = date_create($row["occupancyStart"]);
			$enddate = "";
		}
		else
		{
			$startdate = date_create($row["occupancyStart"]);
			$enddate = date_create($row["occupancyEnd"]);
		}
		
         echo "<tr><td>" . $row["propertyStreet"]. "</td><td>" . $row["propertyNo"]. "</td><td>" . date_format($startdate, "d-M-y"). "</td><td>" . date_format($enddate, "d-M-y"). "</td><td>" . $row["firstName"]. "</td><td>" . $row["lastName"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
 
?>
</div>
    </article>
    
  </div>

</div>
</body>
</html>
