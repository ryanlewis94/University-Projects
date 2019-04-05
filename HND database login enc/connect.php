<?php

$username="epiz_22452260";
$password="SbkL4G5eRDSiv";
$database="epiz_22452260_enc";



 try {
   $conn = new PDO('mysql:host=sql301.epizy.com;dbname='.$database.';charset=utf8',$username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   }

catch(PDOException $e) {
   echo die ('Error Message: '. $e->getMessage());
   }
   
?>