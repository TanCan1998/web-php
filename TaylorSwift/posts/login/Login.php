<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>
           登陆
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico"/>
        <style type="text/css">
        html{
            font-family:"微软雅黑";
        }
		body {
		  min-height: 95vh;
		  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
		  background-color:#4EB1DC;
		}
		a:link,a:visited{
            transition:0.2s ease;
			display:block;
			width:320px;
			font-weight:bold;
			color:#FFFFFF;
			background-color:#639BD3;
			text-align:center;
			padding:6px;
			text-decoration:none;
			text-transform:uppercase;
		}
		a:hover,a:active{
			width:360px;
			background-color:#7F81C9;
		}
	</style>
    </head>
    <body>
<?php
session_start();
//注销登录
if ($_GET['action'] == "logout") {
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '<div align="center">注销成功！点击此处<a href="javascript:history.go(-1)">返回</a><br>';
    echo '点击此处 <a href="./">登录|注册</a></div>';
    exit;
}
//注册
if ($_GET['action'] == "register") {
    $username = htmlspecialchars($_POST['username']);
    $nickname = htmlspecialchars($_POST['nickname']);
    //包含数据库连接文件
    require_once $_SERVER['DOCUMENT_ROOT'].'./inc/db.php';
    //检测用户名是否重复
    $check_query = $dbb->prepare("select id from i_users where username= :username");
    $check_query->bindValue(':username',$username,PDO::PARAM_STR);
    $check_query->execute();
    $user = $check_query->fetchObject();
    if(!$user){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query=$dbb->prepare("insert into i_users (username,nickname,password)
            values(:un,:nn,:pw)");
        $query->bindValue(':un',$username,PDO::PARAM_STR);
        $query->bindValue(':nn',$nickname,PDO::PARAM_STR);
        $query->bindValue(':pw',$password,PDO::PARAM_STR);
        $query->execute();
        $id=$dbb->lastInsertId();
        $content=<<<EOT
        <div align="center">注册成功！点击此处 <a href="./">登录</a>
        <br>
        用户ID：$id
        <br>
        点击此处<a href="../">返回论坛</a></div>
EOT;
        echo $content;
        exit;
    }
    else{
        echo '<div align="center">用户名已存在！<br>';
        echo '点击此处<a href="javascript:history.back(-1)">返回</a></div>';
        exit;
    }
}
$username = htmlspecialchars($_POST['username']);
//包含数据库连接文件
require_once $_SERVER['DOCUMENT_ROOT'].'./inc/db.php';
//检测用户名及密码是否正确
$check_query = $dbb->prepare("select * from i_users where username= :username");
$check_query->bindValue(':username',$username,PDO::PARAM_STR);
$check_query->execute();
$user = $check_query->fetchObject();
if(!$user){
    exit('<div align="center">登录失败！点击此处 <a href="./">返回重试</a></div>');
}
$hash = $user->password;
if (password_verify($_POST['password'], $hash)) {
    //登录成功
    $_SESSION['username'] = $user->nickname;
    $_SESSION['userid'] = $user->id;
    echo '<div align="center">登陆成功<br/>',$user->nickname, ',欢迎你！进入 <a href="../">论坛</a><br />';
    exit;
} else {
    exit('<div align="center">登录失败！点击此处 <a href="./">返回重试</a></div>');
}
?>
    </body>
</html>