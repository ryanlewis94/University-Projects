<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<style>
.error {color: #FF0000;}
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
include("connect_team.php");

$data = $conn->prepare('SELECT * FROM '.$table );
	$data->execute();


		while ($row = $data->fetch(PDO::FETCH_OBJ)) {

			printf ("%s , %s", $row->TeamNo , $row->TeamName."<br>");
			}

		$conn = null;

// define variables and set to empty values
$teamnoErr = $fornameErr = $surnameErr = $usernameErr = $passwordErr = "";
$teamno = $forname = $surname = $username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["TeamNo"])) {
     $teamnoErr = "";
   } else {
     $teamno = test_input($_POST["TeamNo"]);
   }
   
   if (empty($_POST["ForName"])) {
     $fornameErr = "";
   } else {
     $forname = test_input($_POST["ForName"]);
   }
     
   if (empty($_POST["SurName"])) {
     $surnameErr = "";
   } else {
     $surname = test_input($_POST["SurName"]);
   }

   if (empty($_POST["UserName"])) {
     $usernameErr = "";
   } else {
     $username = test_input($_POST["UserName"]);
   }

   if (empty($_POST["UserPassword"])) {
     $passwordErr = "";
   } else {
     $password = test_input($_POST["UserPassword"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<br><br>
<p><span class="error">* required field.</span></p>
<form action="mydbregister.php" method="post">
Enter the number of your team below:<br>
<input type="number" name="TeamNo" min="1" max="100" value="1">
<span class="error">* <?php echo $teamnoErr;?></span>
<br><br>
Are you a player or Manager?<br>
<input type="radio" name="UserCode" value="P" checked> Player
<br>
<input type="radio" name="UserCode" value="M"> Manager
<br><br>
What Position are you?
<br>
Position:<br>
<select name="Position">
  <option value="M">Manager</option>
  <option value="GK">Goalkeeper</option>
  <option value="RB">Right back</option>
  <option value="CB">Centre back</option>
  <option value="LB">Left back</option>
  <option value="CDM">Defensive Midfielder</option>
  <option value="CM">Central Midfield</option>
  <option value="CAM">Offensive Midfielder</option>
  <option value="RW">Right Wing</option>
  <option value="LW">Left Wing</option>
  <option value="ST">Striker</option>
</select><br><br>
Enter your Forname and Surname below:
<br>
Forname:<br> <input type="text" name="ForName">
<span class="error">* <?php echo $fornameErr;?></span>
<br>
Surname:<br> <input type="text" name="SurName">
<span class="error">* <?php echo $surnameErr;?></span>
<br><br>
Enter your new User name and password below:
<br>
Username:<br> <input type="text" name="UserName">
<span class="error">* <?php echo $usernameErr;?></span>
<br>
Password:<br> <input type="password" name="UserPassword">
<span class="error">* <?php echo $passwordErr;?></span>
<br>
<input type="submit" value="Register">
</form>

<br>
<a href="main_login.php">Back to Login</a>

 </div>
    
</div>
</body>
</html>