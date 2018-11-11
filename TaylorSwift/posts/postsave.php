<!DOCTYPE html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<title>PostSave</title>
</head>
<body>
	<?php 
		if(!$_POST['time']){  
        	exit("非法访问！"); 
        }
        require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
        $title = htmlentities($_POST['title']);
        $body= htmlentities($_POST['body']);
        $time = $_POST['time'];
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
        $sql = "INSERT INTO i_posts (title, body, created_at,catalog)VALUES('$title','$body','$time','$catalog')";
        if(!mysqli_query($db,$sql)){
            echo mysqli_error($db);
            echo '<br>' . $sql;
        }else{
            echo '<script language="JavaScript">;alert("发表成功！");location.href="./posts.php?catalog=cata1";</script>;';
        };
	?>
</body>
</html>