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
  
<div id="Sign-Up"> <fieldset style="width:30%"><legend>Registration Form</legend> <table border="0"> <tr> <form method="POST" action="mydbregister.php">
<tr> <td>UserName</td><td> <input type="text" name="user" required></td> </tr> 
<tr> <td>Password</td><td> <input type="password" name="pass" required></td> </tr> 
<tr> <td>Confirm Password </td><td><input type="password" name="cpass" required></td> </tr> 
<tr> <td><input id="button" type="submit" name="submit" value="Submit"></td> </tr> </form> </table> </fieldset> 

<a href="main_login.php">Back to Login</a>
</div>

</div>
</div>

</body>
</html>