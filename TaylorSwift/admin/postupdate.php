<!DOCTYPE html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<title>PostSave</title>
    <style>
        body{
            min-height: 95vh;
            background:#FFFFFF url(../images/8.jpg) no-repeat fixed top;
            background-size:1280px 830px;
            background-attachment:fixed;
        }
</style>
</head>
<body>
	<?php 
		require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
        $id=$_GET['id'];
        $title = htmlentities($_POST['title']);
        $body= htmlentities($_POST['body']);
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
            case "育儿":
                $catalog=7;
                break;
            case "星座":
                $catalog=8;
                break;
            case "其他":
                $catalog=9;
                break;
        };
        $sql = "update i_posts set title = '{$title}',body= '{$body}',catalog='{$catalog}' where id = '{$id}'";
        if(!mysqli_query($db,$sql)){
            echo mysqli_error($db);
            echo '<br>' . $sql;
        }else{
            echo '<div align="center">
                <p style="letter-spacing:16px;margin-top:288px;color:#FFFFFF;text-shadow:4px 4px 16px #E61AA6;font-size:60px;font-weight:900">☺更新成功☺</p>
            </div>';
            echo '<script language="JavaScript">setTimeout(function(){location.href="./postsedit.php";},"2000");</script>';
        };
	?>
</body>
</html>