<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>
            更新
        </title>
        <style>
            body{
	            background:#FFFFFF url(../../images/<?php echo rand(1,10); ?>.jpg) no-repeat fixed top;
	            background-size:100%;
	            background-attachment:fixed;
	            overflow:hidden;
            }
            p{
                letter-spacing:16px;
                margin-top:288px;
                color:#FFFFFF;
                font-size:60px;
                font-weight:900
            }
            @media only screen and (max-width: 500px) {
                body{
                    background-size:310%;
                }
                p{
                  letter-spacing:10px;
                  margin-top:188px;
                  color:#FFFFFF;
                  font-size:35px;
                  font-weight:900;
                }
            }
        </style>
    </head>
    <body>
        <?php
        	session_start();  
   			//检测是否登录
			if(!isset($_SESSION['managerid'])){
	    		exit('非法访问!');
			} 
			require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php';
			$id = $_POST['id'];
			$title = str_ireplace(" ", "", htmlentities($_POST['title']));
			$body= preg_replace('/<\/?(html|head|meta|link|base|body|title|style|script|form|iframe|frame|frameset)[^><]*>/i','',str_replace(array("\r\n", "\r", "\n"),'', $_POST['body']));
			$time = $_POST['time'];
		    $query=$dbb->prepare("update i_news set title = :title,body= :body,time=:time where id = :id");
	        $query->bindValue(':id',$id,PDO::PARAM_INT);
	        $query->bindValue(':title',$title,PDO::PARAM_STR);
	        $query->bindValue(':body',$body,PDO::PARAM_STR);
	        $query->bindValue(':time',$time,PDO::PARAM_STR);
		    if(!$query->execute()){
                echo "错误!";
                echo '<br>';
            }else{
		    	echo '<div align="center">
                <p style="text-shadow:4px 4px 16px #00FFFF;">☺修改成功☺</p>
                </div>';
                echo '<script language="JavaScript">setTimeout(function(){location.href="./";},"2000");</script>';
		  	};
        ?>
    </body>
</html>
