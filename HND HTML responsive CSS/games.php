<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Games</title>
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
      <h1>Game of the Week</h1>
      <h3>Sunday 29th November</h3>
      <h3>12:00 am</h3>
      <h2>Aberkenfig  V  Blackmill</h2>
      <h2>5 - 0</h2>
      <p><b>(Aber)</b>Jamie 12' 25' 79'</p>
      <p><b>(Aber)</b>Riyad 43' 60'</p>
    </article>
    
<section id="fixtures">
  <h1>Fixtures</h1>
 <div id="fixturestable">
 <?php
 
  if (!$myxml=simplexml_load_file('fixtures.xml')){

	echo 'Error reading the XML file';

	}


	foreach($myxml as $FIXTURE){

		echo '<hr />';
		
		echo  $FIXTURE->MATCHUP . '<br />';
		
		echo  $FIXTURE->DATE . '<br />';	

		echo  $FIXTURE->TIME . '<br />';


                echo '<br />';	
	
	}
	echo '<hr />';
?>
</div>
</section>

<section id="results"> 
  <h1>Results</h1>
 <div id="resultstable">
<?php
 
  if (!$myxml=simplexml_load_file('results.xml')){

	echo 'Error reading the XML file';

	}


	foreach($myxml as $RESULT){

		echo '<hr />';
		
		echo  $RESULT->DATE . '<br />';	

		echo  $RESULT->TIME . '<br />';
		
		echo  $RESULT->MATCHUP . '<br />';

                echo '<br />';	
	
	}
	echo '<hr />';
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
