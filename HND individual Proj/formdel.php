<?php

//PDO php Data Objects
include("connect.php");

$data = $conn->prepare('SELECT * FROM '.$table );
	$data->execute();


		while ($row = $data->fetch(PDO::FETCH_OBJ)) {

			printf ("%s , %s , %s", $row->CustomerNo , $row->CustomerName , $row->CustomerAddress."<br>");
			}

		$conn = null;

?>
<br>
<br>
<form action="mydbdelete.php" method="post">
Enter the customer number you want to Delete:<br>
<input type="text" name="CustomerNo"><br>
<input type="submit">
</form>

<br>
<a href="Index.html">Main Menu</a><br>