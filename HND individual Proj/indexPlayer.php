<?php
session_start();
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
<script type="text/javascript">
var d = new Date()
var time = d.getHours()

if (time < 12) 
{
    document.write("<h1><b>Good morning</b></h1>")
}
else if (time < 15)
{
	 document.write("<h1><b>Good afternoon</b></h1>")
}
else
{
     document.write("<h1><b>Good evening</b></h1>")
}
</script>
      <h1>
      <?php

$host="localhost"; // Host name 
$username="user_14568811"; // Mysql username 
$password="champyrolo123"; // Mysql password 
$db_name="db_14568811"; // Database name 
$table="user"; // Table name 

$myusername = $_SESSION['checkusername'];

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $table WHERE UserName='$myusername'";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result)) {
echo "Welcome " . $row['ForName'];
$_SESSION['checkteamno'] = $row['TeamNo'];
$_SESSION['userno'] = $row['UserNo'];
}

?>
</h1>
      <h3>Local Weather</h3>
      <div id="breakingnews">
	<div id="feedControl">Loading..</div></div>
    </article>
    
<section id="news">
  <h1>News</h1>
  <article>
  	<p>Game of the week as Aberkenfig beat Blackmill 5 - 0</p>
    <p>Under 16's go top of the league</p>
    <p>Big game next week for Bridgend</p>
    <p>Aaron Ramsey makes an appearance at the presentation</p>
    <p>Looking for more coaches and referees</p>
    <p>Joe produces a brilliant display in goal for Pyle</p>
    <p>Bring your kids along on a Friday night for a training session</p>
  </article>
</section>
<section id="pictures"> 
  <h1>Recent Pictures</h1>
  <figure><img src="images/soccer.jpg" width="315" height="245" alt="in game picture"></figure>
  <br>
  <p><a href="mediaPlayer.html">More Pictures...</a></p>
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
