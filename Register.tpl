<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error { color: #FF0000; }
    </style>
    <link rel="stylesheet" type="text/css" href="css/Register.css"></link>
    <meta charset="UTF-8">
    <title>REGISTER</title>
</head>
<body>
<div class="SignInArea">
    <form  id="SignForm" action="/myProject/TinyTwitter/Register.php" method="post">
        Username: &nbsp;<input id="input1" type="text" name="name" />
        <span class="error">* <br>{$nameErr}</span><br>
        Password: &nbsp;&nbsp;<input  type="password" id="input1" type="text" name="password1" />
        <span class="error">* <br>{$password1Err}</span><br>
        Repeat Password:  &nbsp; <input  type="password" id="input2" type="text" name="password2" />
        <span class="error">* <br>{$password2Err}</span><br>
        Email:  &nbsp; <input id="input3" type="text" name="email" />
        <span class="error">* <br>{$emailErr}</span><br>
        <input class="button" type="submit" value="SUBMIT" />
        {$success}
    </form></div>
</body>
</html>