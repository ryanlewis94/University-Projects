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
<form action="update_SQL.php" method="post">
Enter the Customer Number you want to change here:<br>
CustomerNo:<br> <input type="text" name="CustomerNo"><br><br><br>
Enter the new details below<br>
CustomerName:<br> <input type="text" name="CustomerName"><br>
CustomerAddress:<br> <input type="text" name="CustomerAddress"><br>
<input type="submit">
</form>

<br>
<a href="Index.html">Main Menu</a><br>