<?php

//PDO php Data Objects


include("connect.php");


$data = $conn->prepare('SELECT * FROM '.$table );
	$data->execute();


		while ($row = $data->fetch(PDO::FETCH_OBJ)) {

			printf ("%s , %s ", $row->CustomerName , $row->CustomerAddress."<br>");
			}

		$conn = null;

?>