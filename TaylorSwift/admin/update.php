<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            更新
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
			$id = $_POST['id'];
			$title = htmlentities($_POST['title']);
			$body = htmlentities($_POST['body']);
			$time = $_POST['time'];
		    $sql = " update i_news set title = '{$title}',body= '{$body}',time='{$time}' where id = '{$id}' ";
		    if(preg_replace('# #','',$title)==""){
		    	echo "<script language=\"JavaScript\">;alert(\"标题不能为空！\");location.href=\"./edit.php?id={$id}\";</script>;";
		    }else if(preg_replace('# #','',$body)==""){
		    	echo "<script language=\"JavaScript\">;alert(\"内容不能为空！\");location.href=\"./edit.php?id={$id}\";</script>;";
		    }else if(!mysqli_query($db,$sql)){
		    	echo mysqli_error($db);
		    	echo '<br>' . $sql;
		    }else{
		    	echo '<script language="JavaScript">;alert("修改成功");location.href="./newsedit.php";</script>;';
		  	};
        ?>
    </body>
</html>
