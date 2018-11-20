<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>新闻列表</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
        }
		body {
		  min-height: 95vh;
		  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
		  background-color:#E9E4CD;
		  background-attachment:fixed;
		}
		ul{
			list-style-type:none;
			margin:0;
			padding:0;
			overflow:hidden;
		}
		a:link,a:visited{
			transition:0.2s ease;
			display:block;
			width:320px;
			color:#FFFFFF;
			background-color:#BDE61A;
			text-align:center;
			padding:8px;
			text-decoration:none;
			text-transform:uppercase;
		}
		a:hover{
			width:360px;
			background-color:#99AA55;
		}
		a:active{
			width:340px;
		}
		.back li{
			float: left;
		}
		.back a{
			color:#E9E4CD;
			background-color:#99AA55;
		}
		.button 
	</style>
</head>
<body>
	<div align="center">
	<h1>LIST</h1>
	<ul>
	<?php 
		session_start();  
   		//检测是否登录
		if(!isset($_SESSION['userid'])){  
    		exit('非法访问!');
		} 
		require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php';
		$query=$dbb->prepare("select * from i_news order by id");
        $query->execute(); 
		while ($row = $query->fetch(PDO::FETCH_NUM)) {
	?>
		<li><a href="editnews.php?id=<?php echo $row[0]; ?>" style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis" title="时间<?php echo $row[3];?>">
			<?php echo '@',$row[1];?>
	    </a></li>
	<?php }?>
	</ul>
	</div>
	<div class="back" align="center">
		<a href="./admin.php">返回</a>
		<a href="./addnews.php">新增</a>
	</div>

</body>
</html>