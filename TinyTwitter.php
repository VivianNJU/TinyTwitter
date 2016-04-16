<?php
session_start();
$article = $user_id = "";
$articleErr = "";
//http://localhost/myProject/TinyTwitter/TinyTwitter.php
if(!isset($smarty)) {
    include("./smarty/libs/Smarty.class.php");
    $smarty = new Smarty();
    define('SMARTY_ROOT', './smarty');
    $smarty->caching = false;
    $smarty->template_dir = SMARTY_ROOT . "/templates/";
    $smarty->compile_dir = SMARTY_ROOT . "/templates_c/";
    $smarty->config_dir = SMARTY_ROOT . "/configs/";
    $smarty->cache_dir = SMARTY_ROOT . "/cache/";
}

if(isset($_SESSION['user_id'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["article"])) {
            $articleErr = "Content cannot be empty!";

        } else {
            $article = $_POST["article"];
            $user_id = $_SESSION['user_id'];
            // 检查姓名是否包含字母和空白字符
        }
    }

    if($article!=null&&$articleErr==null){
        $dbc = mysqli_connect('localhost','root','123456','blog');
        $query = "INSERT INTO article(article_content,user_id)VALUES ('$article','$user_id')";
        mysqli_query($dbc,$query);
        mysqli_close($dbc);
    }

    $smarty->assign("articleErr", $articleErr);
    $smarty->display("TinyTwitter.tpl");
}
else{
    require("Login.php");
}


?>