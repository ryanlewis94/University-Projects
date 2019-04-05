<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Failed</title>
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

$host="localhost"; // Host name 
$username="user_14568811"; // Mysql username 
$password="champyrolo123"; // Mysql password 
$db_name="db?14568811"; // Database name 
$table="user"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

include("hash.php");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

$sql="SELECT * FROM $table WHERE UserName='$myusername'";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result)) {
$pass_hash = $row['UserPassword'];
}

if(crypt($mypassword, $pass_hash) == $pass_hash) {
    $mypassword = $pass_hash;
  }
  
// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $table WHERE UserName='$myusername' and UserPassword='$mypassword'";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result)) {
// Set session variables
$_SESSION['checkuserid'] = $row['UserID'];
}
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "index.html"
session_register("myusername");
session_register("mypassword"); 
header("location:customer.php");
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

  </div>
    
</div>
</body>
</html>
