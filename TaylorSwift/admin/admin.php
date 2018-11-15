<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>User</title>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
          	min-height: 95vh;
            background:#FFFFFF url(../images/background<?php echo rand(3,6);?>.gif) no-repeat fixed center;
            background-size:100%;
            background-attachment:fixed;
        }
		/*body {
		  min-height: 95vh;
		  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
		  background-color:#20CECE;
		}*/
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
	</style>
</head>
<body>
	<?php 
		session_start();  
   		//检测是否登录  
		if(!isset($_SESSION['userid'])){  
    		exit('非法访问!');
		} 
		$userid = $_SESSION['userid'];  
		$username = $_SESSION['username'];  
	?>
	<div align="center">
		<ul>
			<li><a title="首页" href="../">Home</a></li>
			<li><a title="编辑新闻" href="newslist.php">News</a></li>
			<li><a title="编辑帖子" href="postslist.php">Posts</a></li>
			<li><a title="审核评论" href="#about">Comments</a></li>
		</ul>
		<h1><?php echo '管理员：',$username; ?></h1>
		<h2><?php echo 'ID：',$userid; ?></h2>
		<p><?php echo '<a href="login.php?action=logout">注销</a>';  ?></p>
	</div>

</body>
</html>