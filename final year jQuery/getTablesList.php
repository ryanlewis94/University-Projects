<?php
  include "mysqlconnect.php";
  $ok=true;
  try {
	$dbh = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password); // connect to database
  }
  catch (PDOException $e) { //if failed connection
      $ok = false; //set ok to be false
  }
  if($ok) //if ok is true
  {
      try {
		  
		$tableschema = $database; //set the tableschema to be the name of the database
		$sql = $dbh->prepare('SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = :tableschema'); //create the sql statement
		$sql->bindParam(':tableschema', $tableschema); //put the value of tableschema into the sql
		$sql->execute(); //execute the sql statement
		
          if ( $sql->columnCount() > 0 ) //if data was found
          {

                  $items = array(); //create array
				  $i=0;  //create i and set it to 0
                  while($row=$sql->fetch()) //while there is rows in the database
                  { 
					$i++; //add 1 to i
                    $items[] = array (strval($i), $row[0]); //add the value of i and the rows into the array
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
