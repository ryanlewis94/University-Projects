<?php

$username="user_14568811";
$password="champyrolo123";
$database="db_14568811";
$table="members";


 try {
   $conn = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8',$username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   }

catch(PDOException $e) {
   echo die ('Error Message: '. $e->getMessage());
   }
   
?>