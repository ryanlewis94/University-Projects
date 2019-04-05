<?php

//PDO php Data Objects

$CustomerName= $_POST["CustomerName"];
$CustomerAddress= $_POST["CustomerAddress"];

include("connect.php");

$query = $conn->prepare('INSERT INTO '.$table.'(CustomerName, CustomerAddress)
VALUES(:CustomerName,:CustomerAddress)');

	$query ->execute(array(
	':CustomerName' =>$CustomerName,
	':CustomerAddress' =>$CustomerAddress)
		);
		
	echo "Inserted into the database";

	$conn = null;

?>

<br>
<br>
<a href="mydbphp.php">Display Records</a><br>
<a href="Index.html">Main Menu</a><br>