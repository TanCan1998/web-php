<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<title>PostSave</title>
    <style>
        body{
            background:#FFFFFF url(../images/<?php echo rand(1,10); ?>.jpg) no-repeat fixed top;
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
		if(!$_POST['time']){  
        	exit("非法访问！"); 
        }
        require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php';
        $title = str_ireplace(" ", "", htmlentities($_POST['title']));
        $body= preg_replace('/<\/?(html|head|meta|link|base|body|title|style|script|form|iframe|frame|frameset)[^><]*>/i','',str_replace(array("\r\n", "\r", "\n", " "),'', $_POST['body']));
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
        $query=$dbb->prepare("INSERT INTO i_posts (title, body, created_at,catalog)VALUES(:title,:body,:time,:catalog)");
        $query->bindValue(':title',$title,PDO::PARAM_STR);
        $query->bindValue(':body',$body,PDO::PARAM_STR);
        $query->bindValue(':time',$time,PDO::PARAM_STR);
        $query->bindValue(':catalog',$catalog,PDO::PARAM_INT);
        $check_pic=0;
        if(!$query->execute()){
            echo '<div align="center">
                <p style="text-shadow:4px 4px 16px #E61A00;">文章发表出错!</p>
            </div>';
        }else{
            if(empty($_FILES['file']['tmp_name'])){
                ;
            }else if($_FILES["file"]["error"]){
                echo $_FILES["file"]["error"];    
            }else{
                //没有出错
                //加限制条件
                //判断上传文件类型图片且大小不超过102400000B
                $filetype = array("image/jpg","image/jpeg","image/gif","image/bmp","image/png");
                if(in_array($_FILES["file"]["type"]."", $filetype)&&$_FILES["file"]["size"]<20000000){
                    //防止文件名重复
                    $filename =time().rand(0,9).$_FILES["file"]["name"];
                    $filepath =$_SERVER['DOCUMENT_ROOT'] ."./posts/pic/". $filename;
                    //检查文件或目录是否存在
                    if(file_exists($filepath)){
                        echo"该文件已存在";
                    }else {  
                        //保存文件,   move_uploaded_file 将上传的文件移动到新位置 
                        move_uploaded_file($_FILES["file"]["tmp_name"],$filepath);//将临时地址移动到指定地址 
                        $query=$dbb->prepare("INSERT INTO i_pic (path, post_id)VALUES(:path,:post_id)");
                        $check_pic=1;
                        $query->bindValue(':path',$filename,PDO::PARAM_STR);
                        $query->bindValue(':post_id',$dbb->lastInsertId(),PDO::PARAM_INT);
                    }        
                }else{
                    echo "文件过大或类型不对";
                }
            }
            if($check_pic==1){
                if(!$query->execute())
                    $check_pic==1;
                else $check_pic=0;
            }
            if($check_pic==0){
            echo '<div align="center">
                <p style="text-shadow:4px 4px 16px #E61AA6;">☺发表成功☺</p>
            </div>';
            echo '<script language="JavaScript">setTimeout(function(){location.href="./index.php?catalog=cata'.$_GET['cata'].'";},"2000");</script>';
            }else{
                echo '<div align="center">
                <p style="text-shadow:4px 4px 16px #E61A00;">图片储存出错!</p>
            </div>';
            }
        };
	?>
</body>
</html>