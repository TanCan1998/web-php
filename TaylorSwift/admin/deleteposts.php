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
	    require_once'../inc/db.php';
	    $id = $_GET['id'];
	    $sql = " delete from i_posts where id = '{$id}' ;";
	    if(!mysqli_query($db,$sql)){
        echo mysqli_error($db);
        echo '<br>' . $sql;
    	}
      $sql = " delete from i_comments where post_id = '{$id}'";
      if(!mysqli_query($db,$sql)){
        echo mysqli_error($db);
        echo '<br>' . $sql;
      }else{
        echo '
        <div align="center">
          <p style="letter-spacing:16px;margin-top:288px;color:#FFFFFF;text-shadow:4px 4px 16px #E61AA6;font-size:60px;font-weight:900">☺删除成功☺</p>
        </div>';
      }
	?>
	<script> 
		setTimeout(function(){location.href='./postsedit.php';},"2000"); 
	</script>
</body>
</html>