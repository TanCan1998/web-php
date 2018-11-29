<!doctype html>
<html>
<head>
  	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  	<title>删除帖子</title>
  	<style>
   		html{
        	font-family:"微软雅黑";
    	}
      body{
        background:#FFFFFF url(../../images/<?php echo rand(1,10); ?>.jpg) no-repeat fixed top;
        background-size:100%;
        background-attachment:fixed;
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
    if(!isset($_SESSION['userid'])){  
      exit('非法访问!'); 
    }       
    require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php';
    $id = $_GET['id'];
    $query=$dbb->prepare(" delete from i_posts where id = :id");
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    if(!$query->execute()){
      echo '
            <div align="center">
                <p style="text-shadow:4px 4px 16px #E61A00;">删除帖子出错!</p>
            </div>';
  	}else{
      $query=$dbb->prepare(" delete from i_comments where post_id = :id");
      $query->bindValue(':id',$id,PDO::PARAM_INT);
      if(!$query->execute()){
        echo '
            <div align="center">
                <p style="text-shadow:4px 4px 16px #E61A00;">删除评论出错!</p>
            </div>';
      }else{
        $query=$dbb->prepare("select * from i_pic where post_id = :id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        if(!$query->execute()){
          echo '
            <div align="center">
              <p style="text-shadow:4px 4px 16px #E61A00;">查找图片出错!</p>
            </div>';
        }else{
          while ($pic = $query->fetchObject()) {
            $filename=$_SERVER['DOCUMENT_ROOT'] ."./posts/pic/". $pic->path;
            unlink($filename);
          }
          $query=$dbb->prepare(" delete from i_pic where post_id = :id");
          $query->bindValue(':id',$id,PDO::PARAM_INT);
          if(!$query->execute()){
            echo '
              <div align="center">
                <p style="text-shadow:4px 4px 16px #E61A00;">删除图片路径出错!</p>
              </div>';
          }else{
          echo '
            <div align="center">
              <p style="text-shadow:4px 4px 16px #FFEE00;">☺删除成功☺</p>
            </div>';
          }
        }
      }
    }
	?>
	<script>
		setTimeout(function(){location.href='./';},"2000"); 
	</script>
</body>
</html>