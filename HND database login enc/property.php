<?php
include ("sessionstart.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Property</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
type="text/javascript"></script>

<style type="text/css">
@import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");
#propertytable {
	padding-bottom:10px;
	padding-left:260px;
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
    <h1>Properties</h1>
    <div id="propertytable">
<?php

include("connect_db.php");

$sql = "SELECT propertyID, propertyNo, propertyStreet FROM Property";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
     echo "<table><tr><th>Property ID</th><th>Property No</th><th>Property Street</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["propertyID"]. "</td><td>" . $row["propertyNo"]. "</td><td>" . $row["propertyStreet"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>
</div>
    </article>
    
<section id="box3">
  <h1>Update Property</h1>
  <br>
  <form action="updateproperty.php" method="post">
  <h3>Enter the PropertyID you want to update:</h3>
 <input type="number" name="PropertyID" min="1" max="100" value="1" required><br><br><br>
<h3>Enter the Property details below</h3>
<b>Property No:</b><br> <input type="text" name="PropertyNo" required><br>
<b>Property Street:</b><br> <input type="text" name="PropertyStreet" required><br>
<input type="submit">
</form>
</section>

<section id="box2"> 
  <div id="add/delete">
 <h1>Add  Property</h1>
<br>
<form  action="mydbaddproperty.php" method="post">
<b>Property No:</b><br> <input type="text" name="PropertyNo" required>
<br>
<b>Property Street:</b><br> <input type="text" name="PropertyStreet" required>
<br>
<input type="submit" value="Add Property">
</form>
<br><br>
<h1>Delete Property</h1>
<br>
  <form action="mydbdeleteproperty.php" method="post">
<b>Enter the PropertyID you want to Delete:</b><br>
<input type="number" name="PropertyID" min="1" max="100" value="1" required>
<br>
<input type="submit" value="Delete Property" id="delete">
</form>
</div>
</section>
  </div>
  
</div>
</body>
</html>
