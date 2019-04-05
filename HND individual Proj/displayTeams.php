<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
table, th, td {
	border: 1px solid black;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 100%;
	text-align: center;
}
</style>
<body>

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
?>  
</body>
</html>

