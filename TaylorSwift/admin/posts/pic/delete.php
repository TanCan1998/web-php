<!doctype html>
<html>
<head>
  	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  	<title>删除图片</title>
  	<style>
   		html{
        	font-family:"微软雅黑";
    	}
      body{
        background:#FFFFFF url(../../../images/2.jpg) no-repeat fixed top;
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
    if(!isset($_SESSION['managerid'])){  
      exit('非法访问!'); 
    }       
    require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php';
    $id = $_GET['id'];
    $query=$dbb->prepare("select * from i_pic where id = :id");
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    if(!$query->execute()){
      echo '
        <div align="center">
          <p style="text-shadow:4px 4px 16px #E61A00;">查找图片出错!</p>
        </div>';
    }else{
      while ($row = $query->fetch(PDO::FETCH_NUM)) {
        $filename=$_SERVER['DOCUMENT_ROOT'] ."./posts/pic/". $row[1];
        unlink($filename);
      }
      $query=$dbb->prepare(" delete from i_pic where id = :id");
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
	?>
	<script>
		setTimeout(function(){location.href='./';},"2000"); 
	</script>
</body>
</html>