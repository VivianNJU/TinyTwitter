<?php
session_start();
$time = $content = $used_id = "";
$blog = array();
//http://localhost/myProject/TinyTwitter/MyHomepage.php
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
    $user_id = $_SESSION['user_id'];
    $dbc = mysqli_connect('localhost','root','123456','blog');
    $query = "SELECT * FROM article WHERE user_id = '$user_id'";
    $result = mysqli_query($dbc,$query);


    while ($row = mysqli_fetch_array($result)){
        $time = $row['article_addtime'];
        $content = $row['article_content'];
        $temp = array('time' => $time,'content' => $content,);
        array_push($blog,$temp);
    }
   /* $blog = array (
        array (
            'time' => '11111',
            'content' => 'lalalalaal',
        ),
        array (
            'time' => '2222',
            'content' => 'labfbsaal',
        )
    );*/
    $smarty->assign("blog",$blog);
    $smarty->display("MyHomepage.tpl");
}


?>