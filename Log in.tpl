<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		.error { color: #FF0000; }
	</style>
	<link rel="stylesheet" type="text/css" href="css/Log in.css"></link>
	<meta charset="UTF-8">
	<title>LOGIN</title>
</head>
<body>
<div class="SignInArea">
	<form  id="SignForm" action="/myProject/TinyTwitter/Login.php" method="post">
		Username: &nbsp;<input id="input1" type="text" name="name"  />
		<span class="error"> <br>{$nameErr}</span><br>
		Password: &nbsp;&nbsp;<input  type="password" id="input2" type="text" name="password" />
		<span class="error"> <br>{$passwordErr}</span><br>
		<p>Haven't joined us?&nbsp;&nbsp;<span><a href="/myProject/TinyTwitter/Register.php">Register</a></span></p>
		<input class="button" type="submit" value="SUBMIT" />
		<br>{$success}
	</form></div>
</body>
</html>
