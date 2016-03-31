<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>


<?php
//http://localhost/myProject/TinyTwitter/Register.php
// 定义变量并设置为空值
$nameErr = $emailErr = $password1Err= $password2Err = "";
$name = $email  = $password1 =  $password2 = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Username is necessary!";
    } else {
        $name = test_input($_POST["name"]);
        // 检查姓名是否包含字母和空白字符
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only allow letters and space!";
        }
    }

    if (empty($_POST["password1"])) {
        $password1Err = "Password is necessary!";
    } else if (empty($_POST["password2"])){
        $password2Err = "Please confirm your password!";
    } else {
        // 检查密码是否一致
        if ($_POST["password1"] != $_POST["password2"]) {
            $password2Err = "Different password!";
        }else{
            $password1 = test_input($_POST["password1"]);
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "E-mail is necessary!";
    } else {
        // 检查电子邮件地址语法是否有效
        $email = test_input($_POST["email"]);
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailErr = "Invalid email format";
            $email = null;
        }
    }

}

function test_input($data) {
    $data = trim($data);//去除用户输入数据中不必要的字符（多余的空格、制表符、换行）
    $data = stripslashes($data);//删除用户输入数据中的反斜杠（\）
    $data = htmlspecialchars($data);//避免 $_SERVER["PHP_SELF"] 被利用
    return $data;
}
?>

<h2>Register Interface</h2>
<p><span class="error">* necessary part</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username:<input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    Password:<input type="password" type="text" name="password1">
    <span class="error">* <?php echo $password1Err;?></span>
    <br><br>
    Password again:<input type="password" type="text" name="password2">
    <span class="error">* <?php echo $password2Err;?></span>
    <br><br>
    E-mail:<input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Register!">
</form>

<?php
if($nameErr == null&&$emailErr == null&&$password1Err == null&&$password2Err == null&&$name != null&&$email  != null&&$password1 != null){
    $dbc = mysqli_connect('localhost','root','123456','blog') or die('Error connecting no MySQL server.');
    $query = mysqli_query($dbc,"SELECT * FROM user");
    while($row = mysqli_fetch_array($query)){
        if($row['user_email'] == $email){
            $success = "This email address has existed!";
        }else{
            $query2 = "INSERT INTO user(user_name,user_password,user_email)VALUES ('$name','$password1','$email')";
            $result = mysqli_query($dbc,$query2) or die('Error querying database');
            $success = "Success!";
        }
    }
    mysqli_close($dbc);
    echo $success;
}
?>


</body>
</html>