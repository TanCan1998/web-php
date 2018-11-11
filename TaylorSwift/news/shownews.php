<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>News</title>
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
        }
		body {
		  min-height: 95vh;
		  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
		  background-color:#54FF9F;
		  background-attachment:fixed;
		}
		h1{
            margin:0px;
            color:#006666;
            text-shadow:4px 4px 16px #006666; 
            font-size:40px;
        }
		a:link,a:visited{
			display:block;
			width:170px;
			color:#FFFFFF;
			background-color:#00cc99;
			text-align:center;
			text-decoration:none;
			text-transform:uppercase;
			border-radius:30px;
			padding:8px;
		}
		a:hover,a:active{
			width:200px;
			background-color:#006666;
			border-radius:30px;
			padding:8px;
		}
		.time{
			font-style:italic;
			line-height:0em;
			letter-spacing:1px;
		}
		.body{
			width:70%; 
			height:60%;
			padding:10px;
			text-indent:2em;
			line-height:2em;
			letter-spacing:3px;
			border-radius:30px 30px 30px 30px;
			color:#006666;
			background-color:#FFFFFF;
			box-shadow: 8px 8px  #006666;
		}
		#scroll {
            position:fixed;
            top:370px; 
            right:100px;
        }
        .scrollItem {
        	font-size:40px;
            width:50px;
        	color:#FFFFFF;
            background-color:#00cc99; 
            cursor:pointer; 
            text-align:center;
            margin:4px;
            padding:3px;
            border-radius: 40px;
            box-shadow:0px 0px 13px 2px #00cc99;
        }
        .scrollItem:hover {
            box-shadow:0px 0px 13px #006666;
        }
        .scrollItem:active{
	        color:#006666;
	        box-shadow:0px 0px 13px #006666 inset,0px 0px 8px #006666;
	    }
	</style>
</head>
<body>
	<?php
		require_once $_SERVER['DOCUMENT_ROOT'].'../inc/db.php';
		require_once $_SERVER['DOCUMENT_ROOT'].'../inc/scroll.php';
		$id    = $_GET['id'];
		$sql   = 'select * from i_news where id = ' . $id;
		$query = mysqli_query($db, $sql);
		$news  = mysqli_fetch_object($query);
	?>
	<div align="center">
		<h1><?php echo $news->title; ?></h1>
			<div class="time">
				<p><?php echo date('Y-m-d H:i',strtotime($news->time)); ?></p>
			</div>
			<div class="body">
				<p><?php echo $news->body; ?></p>
			</div>
			<br>
		<a href="news.php">返回</a>
		<a href="../index.php">首页</a>	
		<?php 
			$last=$id-1;
			$next=$id+1;
			$sql_check='select * from i_news where id = ' . $last;
			$query_check=mysqli_query($db, $sql_check);
			$row=mysqli_fetch_row($query_check);
			if($row!=null){
				echo "<a href=\"shownews.php?id={$last}\" title=\"$row[1]\">上一篇</a>";
			}
			$sql_check='select * from i_news where id = ' . $next;
			$query_check=mysqli_query($db, $sql_check);
			$row=mysqli_fetch_row($query_check);
			if($row!=null){
				echo "<a href=\"shownews.php?id={$next}\" title=\"$row[1]\">下一篇</a>";
			}
			else{
				echo "<a href=\"#\">没有下一篇了╭(╯^╰)╮</a>";
			}
		 ?>
	 </div>
</body>
</html>
