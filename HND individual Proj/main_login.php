<?PHP

session_start();
session_destroy();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="Styles/mainstylesheet.css" rel="stylesheet" type="text/css">
<!--[if lte IE 8]>
<script type="text/javascript" src="javascript/html5.js"></script>
<![endif]-->
<style>
table, th, td {
    border: 0px solid black;
}
#register {
	align-content:center;
}
</style>
</head>

<body>
<div id="container">
  <header id="logo">
	
   </header>
  <div id="maincontent">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="login" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="4"><strong>Member Login</strong></td>
</tr>
<tr>
<td width="67">Username</td>
<td width="4">:</td>
<td colspan="2"><input name="myusername" type="text" id="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td colspan="2"><input name="mypassword" type="password" id="password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td width="98"><input type="submit" name="Submit" value="Login">
<td width="100">
</tr>
</table>
</td>
</form>
</tr>
</table>


<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="register" method="post" action="register.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="4">
<input type="submit" name="register" value="Register"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

  </div>
    
</div>
</body>
</html>
