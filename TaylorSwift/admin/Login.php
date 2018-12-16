<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>
           登陆
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
        <style type="text/css">
        html{
            font-family:"微软雅黑";
        }
		body {
		  min-height: 95vh;
		  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
		  background-color:#33CC99;
		}
		a:link,a:visited{
            transition:0.2s ease;
			display:block;
			width:320px;
			font-weight:bold;
			color:#FFFFFF;
			background-color:#44BB8C;
			text-align:center;
			padding:6px;
			text-decoration:none;
			text-transform:uppercase;
		}
		a:hover,a:active{
			width:360px;
			background-color:#006666;
		}
	</style>
    </head>
    <body>
    	<?php

//登录
session_start();

if (!($_GET['action']=="logout"||isset($_POST['submit1']))) {
    exit('非法访问!');
}
if(isset($_POST['submit1'])){

$managername = htmlspecialchars($_POST['managername']);

//包含数据库连接文件

require_once $_SERVER['DOCUMENT_ROOT'].'./inc/db.php';

//检测用户名及密码是否正确

$check_query = $dbb->prepare("select * from i_admin where managername= :managername");
$check_query->bindValue(':managername',$managername,PDO::PARAM_STR);
$check_query->execute();
$row = $check_query->fetch(PDO::FETCH_NUM);
$hash = $row[2];
if (password_verify($_POST['password'], $hash)) {

    //登录成功

    $_SESSION['managername'] = $row[1];

    $_SESSION['managerid'] = $row[0];
    
    echo '<div align="center">',$managername, '欢迎你！进入 <a href="manage.php">管理中心</a><br />';

    echo '点击此处 <a href="Login.php?action=logout">注销 登录！</a><br /></div>';

    exit;

} else {

    exit('<div align="center">登录失败！点击此处 <a href="javascript:history.back(-1);">返回重试</a></div>');

}
}

//注销登录

if ($_GET['action'] == "logout") {

	unset($_SESSION['managerid']);

    unset($_SESSION['managername']);

    echo '<div align="center">注销成功！点击此处 <a href="./">登录</a><br>';

    echo <<<EOT
    点击此处返回<a href="javascript:;" onclick="window.open('../','swift');window.opener=null;window.open('','_self');window.close();">首页</a></div>
EOT;
    exit;

}

?>
    </body>
</html>
