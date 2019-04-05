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

//PDO php Data Objects
$username="user_14568811";
$password="champyrolo123";
$database="db?14568811";



 try {
   $conn = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8',$username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   }

catch(PDOException $e) {
   echo die ('Error Message: '. $e->getMessage());
   }
   
include("hash.php");

		$usrname = $_POST['user']; 
		$pass = $_POST['pass'];
		$conpass = $_POST['cpass']; 

		$pass_hash = blow_crypt($pass, 10);
		
try {
	if(!empty($_POST['user'])AND!empty($_POST['pass']))
	{ 
		if(!empty($_POST['pass'])AND empty($_POST['cpass']))
		{
			echo "Please make sure that Confirm Password has been entered";
		}
		else
		{
			if ($pass != $conpass)
			{
				echo "Please make sure your passwords match";
			}
			else
			{
				$query = $conn->prepare("SELECT * FROM user WHERE UserName = '$usrname'");
				$query->execute();
				$selected_row = $query->fetch(PDO::FETCH_ASSOC); 
		
				if(! $selected_row)
				{  
					$query = $conn->prepare ('INSERT INTO user (UserName, UserPassword) VALUES (:UserName,:UserPassword)');
			
					$query ->execute(array
					(
					':UserName' =>$usrname,
					':UserPassword' =>$pass_hash)
					);
		
					echo "Registered successfully";

					$conn = null;
				}

				else
				{ 
					echo "This Username has already been registered";
				}
			}
		}
	}
	else
	{
		echo "Please make sure a Username and Password have been entered";	
	}
}
catch(Exception $e){
		echo die ('Error Message: '. $e->getMessage());
}

?>

<br>
<a href="register.php">Back to Register</a>

 </div>
    
</div>
</body>
</html>