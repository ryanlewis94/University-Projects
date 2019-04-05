<?php
include ("sessionstart.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
type="text/javascript"></script>

<style type="text/css">
@import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");
#customertable {
	padding-bottom:10px;
	padding-left:275px;
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
    <h1>Customers</h1>
    <div id="customertable">
<?php

include("connect_db.php");

$sql = "SELECT customerID, firstName, lastName FROM customer";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
     echo "<table><tr><th>Customer ID</th><th>First Name</th><th>Last Name</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["customerID"]. "</td><td>" . $row["firstName"]. "</td><td>" . $row["lastName"]. "</td></tr>";
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
  <h1>Update Customer</h1>
  <br>
  <form action="updatecustomer.php" method="post">
  <h3>Enter the CustomerID you want to update:</h3>
 <input type="number" name="CustomerID" min="1" max="100" value="1" required><br><br><br>
<h3>Enter the new details below</h3>
<b>First Name:</b><br> <input type="text" name="FirstName" required><br>
<b>Last Name:</b><br> <input type="text" name="LastName" required><br>
<input type="submit">
</form>

</section>


<section id="box2"> 
  <div id="add/delete">
 <h1>Add  Customer</h1>
<br>
<form  action="mydbaddcustomer.php" method="post">
<b>First Name:</b><br> <input type="text" name="FirstName" required>
<br>
<b>Last Name:</b><br> <input type="text" name="LastName" required>
<br>
<input type="submit" value="Add Customer">
</form>
<br><br>
<h1>Delete Customer</h1>
<br>
  <form action="mydbdeletecustomer.php" method="post">
<b>Enter the CustomerID you want to Delete:</b><br>
<input type="number" name="CustomerID" min="1" max="100" value="1" required>
<br>
<input type="submit" value="Delete Customer" id="delete">
</form>
</div>
</section>
  </div>
  
</div>
</body>
</html>
