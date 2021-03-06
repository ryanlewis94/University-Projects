<?php
  include "mysqlconnect.php";
  $ok=true;
  try {
	$dbh = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password); //connect to database
  }
  catch (PDOException $e) { //if failed connection
      $ok = false;  //set ok to be false
  }
  if($ok) //if ok is true
  {
      try {
		   
		$tablename = $_GET["tablename"];
		$headname = $_GET["headname"];   //gets the values from the index.html into the variables
		$searchval = $_GET["searchval"];

		$sql = $dbh->prepare("SELECT * FROM $tablename WHERE $headname LIKE '%$searchval%'"); //create the sql statement
		$sql->execute(); //execute the sql statement
		
          if ( $sql->columnCount() > 0 ) //if data was found
          {

                  $items = array(); //create array
                  while($row=$sql->fetch()) //while there is rows in the database
                  { 
						$items[] = $row;  //add the rows to the array
                  } 
				  
                  echo json_encode($items); //echo the array in a json format
          } 
          else //if no data found
              echo '{"error":"Database lookup failed"}'; //display error

     }
      catch (PDOException $e) {
	$ok = false;
	echo '{"error":"Database lookup failed"}'; //display error
      }

  }
  else //if ok was false
      echo '{"error":"Database connection failed"}'; //display error
?>
