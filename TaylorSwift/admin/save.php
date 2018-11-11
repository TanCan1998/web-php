<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            保存
        </title>
    </head>
    <body>
        <?php
            session_start();  
            //检测是否登录，若没登录则转向登录界面  
            if(!isset($_SESSION['userid'])){  
            header("Location:Login.html"); 
            exit(); 
            } 
            require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
            $title = htmlentities($_POST['title']);
            $body= htmlentities($_POST['body']);
            $time = $_POST['time'];
            $sql = "INSERT INTO i_news (title, body, time)VALUES('$title','$body','$time')";
            if(preg_replace('# #','',$title)==""){
                echo "<script language=\"JavaScript\">;alert(\"标题不能为空！\");location.href=\"./new.php\";</script>;";
            }else if(preg_replace('# #','',$body)==""){
                echo "<script language=\"JavaScript\">;alert(\"内容不能为空！\");location.href=\"./new.php\";</script>;";
            }else if(!mysqli_query($db,$sql)){
                echo mysqli_error($db);
                echo '<br>' . $sql;
            }else{
                echo '<script language="JavaScript">;alert("新增成功");location.href="./newsedit.php";</script>;';
            };
        ?>
    </body>
</html>
