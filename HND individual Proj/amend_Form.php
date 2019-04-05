				
<html lang="en">
	
   <head>
   
  </head>
  
  <body>

<?php

//PDO php Data Objects

 include("connect.php");
  
     $data = $conn->prepare('SELECT * FROM '.$table );
	$data->execute(); 

  	while ($rows = $data->fetch(PDO::FETCH_NUM))
         {
		echo $rows[0].' '.$rows[1].' '.$rows[2]."<br>";
         }//end while
	  
 
  
  $conn = null;

 ?> 
 
 <br>
<form method="POST" action="amend_Form_2.php">

Enter Line Number to amend: <input type="number" name="id" min="0" length="3" required>
<p class="submit"><input type="submit" value="Submit"/></p>


</form>
 

 </body>
 </html>