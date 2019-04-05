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
		  
		$tableschema = $database; //set the tableschema to be the name of the database
		$tablename = $_GET["filename"]; //get the name of the table from index.html into the variable
		$sql = $dbh->prepare('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = :tableschema AND TABLE_NAME = :tablename'); //create the sql statement
		$sql->bindParam(':tableschema', $tableschema);
		$sql->bindParam(':tablename', $tablename); //put the values of the variables into the sql
		$sql->execute(); //execute the sql statemtn
		
          if ( $sql->columnCount() > 0 ) //if data was found
          {

                  $items = array(); //create array
                  while($row=$sql->fetch()) // while there is rows in the database
                  { 
                    $items[] = array ($row[0]); //add the value of i and the rows into the array
                  } 
                  echo json_encode($items); //echo the array in a json format

          } 
          else  //if no data found
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
