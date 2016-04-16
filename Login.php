
<?php
//http://localhost/myProject/TinyTwitter/Login.php
//用户名***,密码******，邮箱***@*qq.com
// 定义变量并设置为空值
session_start();
$nameErr = $passwordErr = "";
$name = $password = $success = "";
if(!isset($smarty)){
    include("./smarty/libs/Smarty.class.php");
    $smarty = new Smarty();
    define('SMARTY_ROOT', './smarty');
    $smarty->caching = false;
    $smarty->template_dir = SMARTY_ROOT."/templates/";
    $smarty->compile_dir = SMARTY_ROOT."/templates_c/";
    $smarty->config_dir = SMARTY_ROOT."/configs/";
    $smarty->cache_dir = SMARTY_ROOT."/cache/";
}
if(isset($_SESSION['user_id'])){
    require ("TinyTwitter.php");
}else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "No username!";
        } else {
            $name = $_POST["name"];
        }

        if (empty($_POST["password"])) {
            $passwordErr = "No password!";
        } else {
            $password = $_POST["password"];
        }
    }

    if($nameErr == null&&$passwordErr == null&&$name != null&&$password != null) {
        $dbc = mysqli_connect('localhost', 'root', '123456', 'blog') or die('Error connecting no MySQL server.');
        $query = mysqli_query($dbc, "SELECT * FROM user WHERE user_name = '$name'");
        $query2 = mysqli_query($dbc, "SELECT * FROM user WHERE user_password = SHA('$password')");
        if (mysqli_num_rows($query) == 0) {
            $nameErr = "No such user!";
        } elseif (mysqli_num_rows($query2) == 0) {
            $passwordErr = "Wrong password!";
        } else {

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
}






?>


