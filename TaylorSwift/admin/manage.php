<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>manager</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
          	min-height: 95vh;
            background:#FFFFFF url(../images/background<?php echo rand(3,6);?>.gif) no-repeat fixed center;
            background-size:100%;
            background-attachment:fixed;
        }
		ul{
			list-style-type:none;
			margin:0;
			padding:0;
			overflow:hidden;
		}
		li{
			float:center;
		}
		a:link,a:visited{
			transition:0.2s ease;
			display:block;
			width:120px;
			font-weight:bold;
			color:#FFFFFF;
			background-color:#BDE61A;
			text-align:center;
			padding:5px;
			text-decoration:none;
			text-transform:uppercase;
		}
		a:hover{
			width:160px;
			background-color:#99AA55;
		}
		a:active{
			width:140px;
		}
		@media only screen and (max-width: 500px) {
	        html{
	            background-size:272%;
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
		$managerid = $_SESSION['managerid'];  
		$managername = $_SESSION['managername'];  
	?>
	<div align="center">
		<ul>
			<li><a title="首页" href="../">Home</a></li>
			<li><a title="编辑新闻" href="./news/">News</a></li>
			<li><a title="编辑帖子" href="./posts/">Posts</a></li>
			<li><a title="管理图片(Pictures of Posts)" href="./posts/pic/">Pictures</a></li>
			<li><a title="审核评论(Comment of Posts)" href="#about">Comments</a></li>
		</ul>
		<h1><?php echo '管理员：',$managername; ?></h1>
		<h2><?php echo 'ID：',$managerid; ?></h2>
		<p><?php echo '<a href="login.php?action=logout">注销</a>';  ?></p>
	</div>

</body>
</html>