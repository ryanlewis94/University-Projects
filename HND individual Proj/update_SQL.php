<?php


include("connect.php");


  $CustomerNo=$_POST["CustomerNo"];
  $CustomerName=$_POST["CustomerName"];
  $CustomerAddress=$_POST["CustomerAddress"];

 
  $query = $conn->prepare('UPDATE customer SET CustomerName = :CustomerName,CustomerAddress =:CustomerAddress WHERE CustomerNo =:CustomerNo');
  $query ->execute(array(
    ':CustomerName' =>$CustomerName,
    ':CustomerAddress' =>$CustomerAddress,
    ':CustomerNo' =>$CustomerNo
    ));
     
	 if ($query ->rowCount() >= 1) {
       print 'Row updated.';
      } 
    if ($query ->rowCount() <1) {
       echo 'Row was not updated.';
      }
	 
	 
	 
$conn = null;
?> 

<br>
<br>
<a href="mydbphp.php">Display Records</a><br>
<a href="Index.html">Main Menu</a><br>

