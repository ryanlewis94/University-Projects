<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Team</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
type="text/javascript"></script>

<style type="text/css">
@import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");
#playerTable {
	padding-bottom:10px;
	padding-left:300px;
}
#editinfo {
	padding-bottom:10px;
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
        <li><a href="indexPlayer.php">Home</a></li>
        <li><a href="matchesPlayer.php">Matches</a></li>
        <li><a href="teamPlayer.php">Team</a></li>
        <li><a href="mediaPlayer.html">Media</a></li>
        <li><a href="aboutPlayer.html">About</a></li>
        <li><a href="main_login.php">Logout</a></li>
      </ul>
    </nav>
   </header>
  <div id="maincontent">
    <article id="welcome">
      <?php
	  
$myteamno = $_SESSION['checkteamno'];

include("connect_db.php");

$sql="SELECT * FROM team WHERE TeamNo='$myteamno'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<html><h1></html>";
	echo $row["TeamName"];
	echo "<html></h1></html>";
	echo "<br>";
}
?>
<div id="playerTable">
<?php
$sql = "SELECT * FROM user WHERE TeamNo='$myteamno' ORDER BY UserCode";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
     echo "<table><tr><th>Position</th><th>Forename</th><th>Surname</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["Position"]. "</td><td>" . $row["ForName"]. "</td><td>" . $row["SurName"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>
</div>
    </article>
    
<section id="fixtures">
  <h1>Player Info</h1>
 <div id="playerinfo">

<br> 
<?php
	  
$userno = $_SESSION['userno'];

include("connect_db.php");

$sql="SELECT * FROM user WHERE UserNo='$userno'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo "<html><b>Username: </b></html>";
	echo $row["UserName"];
	echo "<br><br>";
	echo "<html><b>Forename: </b></html>";
	echo $row["ForName"];
	echo "<br>";
	echo "<html><b>Surname: </b></html>";
	echo $row["SurName"];
	echo "<br><br>";
	echo "<html><b>Position: </b></html>";
	echo $row["Position"];
}
?>

</div>
</section>

<section id="results"> 
  <h1>Edit Details</h1>
 <div id="editinfo">
 
<form action="infoUpdate.php" method="post">
<h3>Enter your new details below</h3><br>
<b>Username:</b><br> <input type="text" name="UserName"><br>
<b>Password:</b><br> <input type="password" name="Password"><br><br>
<b>Forename:</b><br> <input type="text" name="ForName"><br>
<b>Surname:</b><br> <input type="text" name="SurName"><br><br>
<b>Position:</b><br> 
<select name="Position">
  <option value="GK">Goalkeeper</option>
  <option value="RB">Right back</option>
  <option value="CB">Centre back</option>
  <option value="LB">Left back</option>
  <option value="CDM">Defensive Midfielder</option>
  <option value="CM">Central Midfield</option>
  <option value="CAM">Offensive Midfielder</option>
  <option value="RW">Right Wing</option>
  <option value="LW">Left Wing</option>
  <option value="ST">Striker</option>
</select><br>
<input type="submit">
</form>

</div>
</section>
  </div>
  
  <footer>
  <div id="date">
<script>
var d = new Date();
document.getElementById("date").innerHTML = d.toDateString();
</script>
</div>
    <p><b>Bridgend Football League</b>, Bridgend, Wales, UK, CF317UJ</p>
        <div id="socialMedia"><a href="http://www.facebook.com"><img src="images/facebook.png" width="24" height="25" alt=		"facebook"></a><a href="http://www.twitter.com"><img src="images/twitter.png" width="24" height="25" alt="twitter"></a></div>
    <p>01656 420420</p>

  </footer>
</div>
</body>
</html>
