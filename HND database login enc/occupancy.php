<?php
include ("sessionstart.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Occupancy</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
type="text/javascript"></script>

<style type="text/css">
@import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");
#occupancytable {
	padding-bottom:10px;
	padding-left:140px;
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
    <h1>Occupancies</h1>
    <div id="occupancytable">
<?php

include("connect_db.php");

$sql = "SELECT occupancyID, propertyID, customerID, occupancyStart, occupancyEnd FROM occupancy";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
     echo "<table><tr><th>Occupancy ID</th><th>Property ID</th><th>Customer ID</th><th>Occupancy Start</th><th>Occupancy End</th></tr>";
     // output data of each row
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
         echo "<tr><td>" . $row["occupancyID"]. "</td><td>" . $row["propertyID"]. "</td><td>" . $row["customerID"]. "</td><td>" . date_format($startdate, "d-M-y"). "</td><td>" . date_format($enddate, "d-M-y"). "</td></tr>";
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
  <h1>Update Occupancy</h1>
  <br>
  <form action="updateoccupancy.php" method="post">
  <h3>Enter the OccupancyID you want to update:</h3>
 <input type="number" name="OccupancyID" min="1" max="100" value="1" required><br><br><br>
<h3>Enter the new details below</h3>
<b>Property ID:</b><br> <input type="number" name="PropertyID" min="1" max="100" value="1" required>
<br>
<b>Customer ID:</b><br> <input type="number" name="CustomerID" min="1" max="100" value="1" required>
<br><br>
<b>Start Date</b><br>
Day:<br>
<select name="StartDay">
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
</select><br>
Month:<br>
<select name="StartMonth">
  <option value="01-">Jan</option>
  <option value="02-">Feb</option>
  <option value="03-">Mar</option>
  <option value="04-">Apr</option>
  <option value="05-">May</option>
  <option value="06-">Jun</option>
  <option value="07-">Jul</option>
  <option value="08-">Aug</option>
  <option value="09-">Sep</option>
  <option value="10-">Oct</option>
  <option value="11-">Nov</option>
  <option value="12-">Dec</option>
</select><br>
Year:<br>
<select name="StartYear">
  <option value="2000-">2000</option>
  <option value="2001-">2001</option>
  <option value="2002-">2002</option>
  <option value="2003-">2003</option>
  <option value="2004-">2004</option>
  <option value="2005-">2005</option>
  <option value="2006-">2006</option>
  <option value="2007-">2007</option>
  <option value="2008-">2008</option>
  <option value="2009-">2009</option>
  <option value="2010-">2010</option>
  <option value="2011-">2011</option>
  <option value="2012-">2012</option>
  <option value="2013-">2013</option>
  <option value="2014-">2014</option>
  <option value="2015-">2015</option>
  <option value="2016-">2016</option>
</select><br><br>

<b>End Date</b><br>
Day:<br>
<select name="EndDay">
  <option value="">none</option>
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
</select><br>
Month:<br>
<select name="EndMonth">
  <option value="">none</option>
  <option value="01-">Jan</option>
  <option value="02-">Feb</option>
  <option value="03-">Mar</option>
  <option value="04-">Apr</option>
  <option value="05-">May</option>
  <option value="06-">Jun</option>
  <option value="07-">Jul</option>
  <option value="08-">Aug</option>
  <option value="09-">Sep</option>
  <option value="10-">Oct</option>
  <option value="11-">Nov</option>
  <option value="12-">Dec</option>
</select><br>
Year:<br>
<select name="EndYear">
  <option value="">none</option>
  <option value="2000-">2000</option>
  <option value="2001-">2001</option>
  <option value="2002-">2002</option>
  <option value="2003-">2003</option>
  <option value="2004-">2004</option>
  <option value="2005-">2005</option>
  <option value="2006-">2006</option>
  <option value="2007-">2007</option>
  <option value="2008-">2008</option>
  <option value="2009-">2009</option>
  <option value="2010-">2010</option>
  <option value="2011-">2011</option>
  <option value="2012-">2012</option>
  <option value="2013-">2013</option>
  <option value="2014-">2014</option>
  <option value="2015-">2015</option>
  <option value="2016-">2016</option>
</select><br><br>
<input type="submit">
</form>
</section>

<section id="box2"> 
<div id="add/delete">
 <h1>Add  Occupancy</h1>
<br>
<form  action="mydbaddoccupancy.php" method="post">
<b>Property ID:</b><br> <input type="number" name="PropertyID" min="1" max="100" value="1" required>
<br>
<b>Customer ID:</b><br> <input type="number" name="CustomerID" min="1" max="100" value="1" required>
<br><br>
<b>Start Date</b><br>
Day:<br>
<select name="StartDay">
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
</select><br>
Month:<br>
<select name="StartMonth">
  <option value="01-">Jan</option>
  <option value="02-">Feb</option>
  <option value="03-">Mar</option>
  <option value="04-">Apr</option>
  <option value="05-">May</option>
  <option value="06-">Jun</option>
  <option value="07-">Jul</option>
  <option value="08-">Aug</option>
  <option value="09-">Sep</option>
  <option value="10-">Oct</option>
  <option value="11-">Nov</option>
  <option value="12-">Dec</option>
</select><br>
Year:<br>
<select name="StartYear">
  <option value="2000-">2000</option>
  <option value="2001-">2001</option>
  <option value="2002-">2002</option>
  <option value="2003-">2003</option>
  <option value="2004-">2004</option>
  <option value="2005-">2005</option>
  <option value="2006-">2006</option>
  <option value="2007-">2007</option>
  <option value="2008-">2008</option>
  <option value="2009-">2009</option>
  <option value="2010-">2010</option>
  <option value="2011-">2011</option>
  <option value="2012-">2012</option>
  <option value="2013-">2013</option>
  <option value="2014-">2014</option>
  <option value="2015-">2015</option>
  <option value="2016-">2016</option>
</select><br><br>

<b>End Date</b><br>
Day:<br>
<select name="EndDay">
  <option value="">none</option>
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
</select><br>
Month:<br>
<select name="EndMonth">
  <option value="">none</option>
  <option value="01-">Jan</option>
  <option value="02-">Feb</option>
  <option value="03-">Mar</option>
  <option value="04-">Apr</option>
  <option value="05-">May</option>
  <option value="06-">Jun</option>
  <option value="07-">Jul</option>
  <option value="08-">Aug</option>
  <option value="09-">Sep</option>
  <option value="10-">Oct</option>
  <option value="11-">Nov</option>
  <option value="12-">Dec</option>
</select><br>
Year:<br>
<select name="EndYear">
  <option value="">none</option>
  <option value="2000-">2000</option>
  <option value="2001-">2001</option>
  <option value="2002-">2002</option>
  <option value="2003-">2003</option>
  <option value="2004-">2004</option>
  <option value="2005-">2005</option>
  <option value="2006-">2006</option>
  <option value="2007-">2007</option>
  <option value="2008-">2008</option>
  <option value="2009-">2009</option>
  <option value="2010-">2010</option>
  <option value="2011-">2011</option>
  <option value="2012-">2012</option>
  <option value="2013-">2013</option>
  <option value="2014-">2014</option>
  <option value="2015-">2015</option>
  <option value="2016-">2016</option>
</select><br><br>
<input type="submit" value="Add Occupancy">
</form>
<br><br>
<h1>Delete Occupancy</h1>
<br>
  <form action="mydbdeleteoccupancy.php" method="post">
<b>Enter the OccupancyID you want to Delete:</b><br>
<input type="number" name="OccupancyID" min="1" max="100" value="1" required>
<br>
<input type="submit" value="Delete Occupancy" id="delete">
</form>
</div>
</section>
  </div>
  
</div>
</body>
</html>
