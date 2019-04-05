<?php

//PDO php Data Objects

$CustomerNo= $_POST["CustomerNo"];
 // $custNo= $_POST['custNo'];
  echo $CustomerNo;

include("connect.php");

    $query = $conn->prepare('DELETE FROM '.$table.' WHERE CustomerNo= :id');
    $query ->bindParam(':id', $CustomerNo); 
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

<br>
<br>
<a href="mydbphp.php">Display Records</a><br>
<a href="Index.html">Main Menu</a><br>