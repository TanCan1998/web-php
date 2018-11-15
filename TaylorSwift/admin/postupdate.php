<!DOCTYPE html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<title>PostSave</title>
    <style>
        body{
            background:#FFFFFF url(../images/<?php echo rand(1,10); ?>.jpg) no-repeat fixed top;
            background-size:100%;
            background-attachment:fixed;
            overflow:hidden;
        }
    </style>
</head>
<body>
	<?php 
        session_start();  
        //检测是否登录
        if(!isset($_SESSION['userid'])){  
            exit('非法访问!');
        } 
		require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
        $id=$_GET['id'];
        $title = str_ireplace(" ", "", htmlentities($_POST['title']));
        $body= preg_replace('/<\/?(html|head|meta|link|base|body|title|style|script|form|iframe|frame|frameset)[^><]*>/i','',str_replace(array("\r\n", "\r", "\n"),'', $_POST['body']));
        $catalog=$_POST['catalog'];
        switch ($_POST['catalog']) {
            case "娱乐":
                $catalog=2;
                break;
            case "文史":
                $catalog=3;
                break;
            case "股票":
                $catalog=4;
                break;
            case "体育":
                $catalog=5;
                break;
            case "美食":
                $catalog=6;
                break;
            case "生活":
                $catalog=7;
                break;
            case "星座":
                $catalog=8;
                break;
            case "其他":
                $catalog=9;
                break;
        };
        $query=$dbb->prepare("update i_posts set title = :title,body= :body,catalog=:catalog where id = :id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->bindValue(':title',$title,PDO::PARAM_STR);
        $query->bindValue(':body',$body,PDO::PARAM_STR);
        $query->bindValue(':catalog',$catalog,PDO::PARAM_INT);
        if(!$query->execute()){
            echo "错误！";
            echo '<br>';
        }else{
            echo '<div align="center">
                <p style="letter-spacing:16px;margin-top:288px;color:#FFFFFF;text-shadow:4px 4px 16px #E61AA6;font-size:60px;font-weight:900">☺更新成功☺</p>
            </div>';
            echo '<script language="JavaScript">setTimeout(function(){location.href="./postslist.php";},"2000");</script>';
        };
	?>
</body>
</html>