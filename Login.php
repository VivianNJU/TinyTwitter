
<?php
//http://localhost/myProject/TinyTwitter/Login.php
//用户名***,密码******，邮箱***@*qq.com
// 定义变量并设置为空值
session_start();
$nameErr = $passwordErr = "";
$name = $password = $success = "";

include("./smarty/libs/Smarty.class.php");
define('SMARTY_ROOT', './smarty');
$smarty = new Smarty();
$smarty->template_dir = SMARTY_ROOT."/templates/";
$smarty->compile_dir = SMARTY_ROOT."/templates_c/";
$smarty->config_dir = SMARTY_ROOT."/configs/";
$smarty->cache_dir = SMARTY_ROOT."/cache/";
$smarty->caching = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "No username!";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "No password!";
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

if($nameErr == null&&$passwordErr == null&&$name != null&&$password != null){
    $dbc = mysqli_connect('localhost','root','123456','blog') or die('Error connecting no MySQL server.');
    $query = mysqli_query($dbc,"SELECT * FROM user WHERE user_name = '$name'");
    $query2 = mysqli_query($dbc,"SELECT * FROM user WHERE user_password = SHA('$password')");
    if(mysqli_num_rows($query)==0){
        $nameErr = "No such user!";
    }elseif (mysqli_num_rows($query2)==0){
        $passwordErr = "Wrong password!";
    }else{
        $success = "Success!";
        $row = mysqli_fetch_array($query);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        //记住用户名和id
    }
    mysqli_close($dbc);
}

$smarty->assign("nameErr", $nameErr);
$smarty->assign("passwordErr", $passwordErr);
$smarty->assign("success", $success);
$smarty->display("Log in.tpl");
?>


