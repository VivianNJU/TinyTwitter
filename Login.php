<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>


<?php
//http://localhost/myProject/TinyTwitter/Login.php
// 定义变量并设置为空值
$nameErr = $password1Err = "";
$name = $password = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "No username!";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["password"])) {
        $password1Err = "No password!";
    } else {
    $password = test_input($_POST["password"]);
    }
}

function test_input($data) {
    $data = trim($data);//去除用户输入数据中不必要的字符（多余的空格、制表符、换行）
    $data = stripslashes($data);//删除用户输入数据中的反斜杠（\）
    $data = htmlspecialchars($data);//避免 $_SERVER["PHP_SELF"] 被利用
    return $data;
}
?>

<h2>Log in Interface</h2>
<p><span class="error"></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username:<input type="text" name="name">
    <span class="error"> <?php echo $nameErr;?></span>
    <br><br>
    Password:<input type="password" type="text" name="password">
    <span class="error"> <?php echo $password1Err;?></span>
    <br><br>
    <input type="submit" name="submit" value="Log in!">
</form>

<?php
if($nameErr == null&&$password1Err == null&&$name != null&&$password != null){
    $dbc = mysqli_connect('localhost','root','123456','blog') or die('Error connecting no MySQL server.');
    $query = mysqli_query($dbc,"SELECT * FROM user");
    while($row = mysqli_fetch_array($query)){
        if($row['user_name'] == $name){
            if($row['user_password'] == $password){
                $success = "Success!";
            }else{
                $passwordErr = "Wrong password!";
            }
        }
    }
    if($success == null&&$password1Err == null){
        $nameErr = "No such user!";
    }
    echo $success;
    mysqli_close($dbc);
}
?>


</body>
</html>