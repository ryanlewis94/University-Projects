<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>League</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
type="text/javascript"></script>

<style type="text/css">
@import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");

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
        <li><a href="index.html">Home</a></li>
        <li><a href="league.php">League</a></li>
        <li><a href="games.php">Games</a></li>
        <li><a href="media.html">Media</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
    </nav>
   </header>
  <div id="maincontent">
    <article id="welcome">
      <h1>League Table</h1>
<div id="leagueTable">
<?php

include("connect_db.php");

$sql = "SELECT TeamName, Wins, Draws, Losses, GoalsFor, GoalsAgainst, Points FROM team ORDER BY Points desc";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
     echo "<table><tr><th>Team</th><th>Wins</th><th>Draws</th><th>Losses</th><th>Goals For</th><th>Goals Against</th><th>Points</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["TeamName"]. "</td><td>" . $row["Wins"]. "</td><td>" . $row["Draws"]. "</td><td>" . $row["Losses"]. "</td><td>" . $row["GoalsFor"]. "</td><td>" . $row["GoalsAgainst"]. "</td><td>" . $row["Points"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>  </div>
    </article>
<section id="cleansheets">
  <h1>Clean Sheets</h1>
 <div id="cleansheetTable">
<?php

include("connect_db.php");

$sql = "SELECT name, cleansheets FROM cleansheets ORDER BY cleansheets desc";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
     echo "<table><tr><th>Goalkeeper</th><th>Clean Sheets</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["name"]. "</td><td>" . $row["cleansheets"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?> 
</div>
</section>
<section id="goalscorers"> 
  <h1>Goalscorers</h1>
 <div id="goalTable">
  <?php

include("connect_db.php");

$sql = "SELECT name, goals FROM goalscorers ORDER BY goals desc";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
     echo "<table><tr><th>Player</th><th>Goals Scored</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["name"]. "</td><td>" . $row["goals"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?> 
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
