<?php

//PDO php Data Objects
$username="root";
$password="";
$database="customer";
$table="custdetail";


 $custNo=12;
 // $custNo= $_POST['custNo'];
  echo $custNo;

 try {
   $conn = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8',$username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   }

catch(PDOException $e) {
   echo die ('Error Message: '. $e->getMessage());
   }

    $query = $conn->prepare('DELETE FROM '.$table.' WHERE id= :id');
    $query ->bindParam(':id', $custNo); 
    $query ->execute();

  //echo $query ->rowCount();
    echo'<br>';
    if ($query ->rowCount() >= 1) {
       print 'Yup, the row was deleted.';
      } 
    if ($query ->rowCount() <1) {
       echo 'Nope, row was not deleted.';
      }

$conn = null;  
?>






