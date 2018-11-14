<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            保存
        </title>
        <style>
            body{
                background:#FFFFFF url(../images/<?php echo rand(1,10); ?>.jpg) no-repeat fixed top;
                background-size:1280px;
                background-attachment:fixed;
                overflow:hidden;
            }
        </style>
    </head>
    <body>
        <?php
            session_start();  
            //检测是否登录，若没登录则转向登录界面  
            if(!isset($_SESSION['userid'])){  
                exit('非法访问!');
            } 
            require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
            $title = htmlentities($_POST['title']);
            $time = $_POST['time'];
            $body= preg_replace('/<\/?(html|head|meta|link|base|body|title|style|script|form|iframe|frame|frameset)[^><]*>/i','',str_replace(array("\r\n", "\r", "\n"),'', $_POST['body']));
            $query=$dbb->prepare("INSERT INTO i_news (title, body, time)VALUES(:title,:body,:time)");
            $query->bindValue(':title',$title,PDO::PARAM_STR);
            $query->bindValue(':body',$body,PDO::PARAM_STR);
            $query->bindValue(':time',$time,PDO::PARAM_STR);
            if(!$query->execute()){
                echo "错误!";
                echo '<br>';
            }else{
                echo '<div align="center">
                <p style="letter-spacing:16px;margin-top:288px;color:#FFFFFF;text-shadow:4px 4px 16px #00FFFF;font-size:60px;font-weight:900">☺新增成功☺</p>
                </div>';
                echo '<script language="JavaScript">setTimeout(function(){location.href="./newsedit.php";},"2000");</script>';
            };
        ?>
    </body>
</html>
