<?php
include ("sessionstart.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Confirmation</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<style>
#maincontent {
	padding-left:300px;
}
</style>
</head>

<body>
<div id="container">
  <header id="logo">
	
   </header>
  <div id="maincontent">

<?php


include("connect.php");


  $custid=$_POST['CustomerID'];
  $firstname=$_POST["FirstName"];
  $lastname=$_POST["LastName"];
 
  $query = $conn->prepare('UPDATE customer SET firstName = :FirstName,lastName = :LastName WHERE customerID =:CustomerID');
  $query ->execute(array(
    ':FirstName' =>$firstname,
	':LastName' =>$lastname,
	':CustomerID' =>$custid
    ));
     
	 if ($query ->rowCount() >= 1) {
       print 'Your Information has been updated';
      } 
    if ($query ->rowCount() <1) {
       echo 'Your Information has not been updated.';
      }
	 
$conn = null;
?> 

<br>
<br>
<a href="customer.php">Back to Customer Page</a><br>

</div>
    
</div>
</body>
</html>
