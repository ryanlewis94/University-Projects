<?php

include "mysqlconnect.php";
  $ok=true;
  try {
	$dbh = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password); //connect to database
  }
  catch (PDOException $e) { //if failed connection
      $ok = false; //set ok to be false
  }
if($ok) //if ok is true
{ 
	try {
		
		$fields = array();
		$data = array();
		$tablename;
		
		foreach ($_POST as $key => $value) {
			if($key == "tablename") {
				$tablename = $value;
			}                          //this loops sorts the posted values into three different variables
			else{
				$fields[] = $key;
				$data[] = $value;
			}
		}
		
			
		$sql = ('INSERT INTO teams(name, league, wins, draws, losses, points) VALUES(?,?,?,?,?,?)'); //creation of sql insert statement
		$stmt = $dbh->prepare($sql); //prepares the sql statement
		$stmt ->execute($data); //executes the sql statement putting the array of data into the values to be inserted
	}
      catch (PDOException $e) {
		$ok = false;
		echo '{"error":"Database lookup failed"}'; //display error
      }

}
else //if ok was false
      echo '{"error":"Database connection failed"}'; //display error
?>