<?php

$host="localhost"; // Host name 
$username="user_14568811"; // Mysql username 
$password="champyrolo123"; // Mysql password 
$db_name="db_14568811"; // Database name 
$table="user"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $table WHERE UserName='$myusername' and UserPassword='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
$row = mysql_fetch_array($result);
echo $row[2]; 
if($count==1){

// Register $myusername, $mypassword and redirect to file "index.html"
session_register("myusername");
if ($row[2] == "P"){  
$permissions = $user['UserCode'];
session_register("player");
header("location:login_success.php?username1=$myusername");
}
else if ($row[2] == "M"){  
$permissions = $user['UserCode'];
session_register("manager");
header("location:login_success2.php?username1=$myusername");
}
else{
echo "Permissions don't exist for this user";
exit();
}
}

else {
echo "Wrong Username or Password";
echo "<br>";
echo "<html><head></html>";
echo '<html><a href="main_login.php">Back to Login</a></html>';
echo "<html></head></html>";
}

ob_en_flush();
?>