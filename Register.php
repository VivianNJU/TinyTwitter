<?php
//http://localhost/myProject/TinyTwitter/Register.php
// 定义变量并设置为空值
$nameErr = $emailErr = $password1Err= $password2Err = "";
$name = $email  = $password1 =  $password2 = $success = "";


include("./smarty/libs/Smarty.class.php");
define('SMARTY_ROOT', './smarty');
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

if($nameErr == null&&$emailErr == null&&$password1Err == null&&$password2Err == null&&$name != null&&$email  != null&&$password1 != null){
    $dbc = mysqli_connect('localhost','root','123456','blog');
    $query = mysqli_query($dbc,"SELECT * FROM user WHERE user_email = '$email'");
    if(mysqli_num_rows($query)==0){
        $query2 = "INSERT INTO user(user_name,user_password,user_email)VALUES ('$name',SHA('$password1'),'$email')";
        mysqli_query($dbc,$query2);
        $success = "Success!";
    }else{
        $emailErr = "This email address has existed!";
    }
    while($row = mysqli_fetch_array($query)){
        if($row['user_email'] == $email){
            $emailErr = "This email address has existed!";
        }else{
            $query2 = "INSERT INTO user(user_name,user_password,user_email)VALUES ('$name','$password1','$email')";
            $result = mysqli_query($dbc,$query2);
            $success = "Success!";
        }
    }
    mysqli_close($dbc);
}

if(isset($_SESSION['user_id'])){
    require_once ("TinyTwitter.php");
}else if($success=="Success!"){
    require_once ("Login.php");
}else{
    $smarty->assign("nameErr", $nameErr);
    $smarty->assign("password1Err", $password1Err);
    $smarty->assign("password2Err", $password2Err);
    $smarty->assign("emailErr", $emailErr);
    $smarty->assign("success", $success);
    $smarty->display("Register.tpl");
}

?>
