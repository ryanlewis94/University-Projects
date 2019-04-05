		
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
<title>Amend Form</title>
</head>

<body>
<?php

Include("../../connect.php");


	   $id =(int)$_POST['id'];

   	                           
          $query = $conn->query('SELECT * FROM '.$table.' WHERE custNo = ' . $conn->quote($id));
                             
          while($row = $query->fetch(PDO::FETCH_ASSOC)) {
		
                 $fName=$row["firstName"];
                 $sName=$row["surName"]  ;      
          
   }//ends while
           
 
  $conn = null;
?>


<form name="myForm" action="../../amend_SQL.php" method="post">


<legend>Change Form</legend>


  <p> <label for="aname">Amend first name:</label></p>
  <p> <input type="text" name="firstname" value="<?php print "$fName"?>"></p>

  <p> <label for="aday">Amend surname:</label></p>
  <p> <input type="text" name="surname"  value="<?php print "$sName"?>"></p>

   <input type="hidden" name="ud_id" value="<?php echo "$id" ?>">

   <p class="submit"><input type="Submit" value="Update"></p>


</form>


</body>
</html>
