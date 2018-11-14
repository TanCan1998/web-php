<!doctype html>
<html>
<head>
  	<meta charset="UTF-8">
  	<title>删除帖子</title>
  	<style>
   		html{
        	font-family:"微软雅黑";
    	}
      body{
        background:#FFFFFF url(../images/2.jpg) no-repeat fixed top;
        background-size:1280px 830px;
        background-attachment:fixed;
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
    require_once'../inc/db.php';
    $id = $_GET['id'];
    $query=$dbb->prepare(" delete from i_posts where id = :id");
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    if(!$query->execute()){
      echo "错误";
      echo '<br>';
  	}
    $query=$dbb->prepare(" delete from i_comments where post_id = :id");
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    if(!$query->execute()){
      echo "错误";
      echo '<br>';
    }else{
      echo '
      <div align="center">
        <p style="letter-spacing:16px;margin-top:288px;color:#FFFFFF;text-shadow:4px 4px 16px #FFEE00;font-size:60px;font-weight:900">☺删除成功☺</p>
      </div>';
    }
	?>
	<script>
		setTimeout(function(){location.href='./postsedit.php';},"2000"); 
	</script>
</body>
</html>