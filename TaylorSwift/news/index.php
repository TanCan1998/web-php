<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>News</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
        }
		body {
		  min-height: 95vh;
		  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
		  background-color:#FF77C9;
		  background-attachment:fixed;
		}
		h1{
			letter-spacing:2px;
            color:#BDE61A;
            text-shadow:4px 4px 16px #3FAA46; 
            font-size:40px;
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
		.home a{
			color:#FF77C9;
			background-color:#99AA55;
		}
		::selection {
            background:#d3d3d3;
        }
        ::-moz-selection {
            background:#d3d3d3;
        }
        ::-webkit-selection {
            background:#d3d3d3;
        }
	</style>
</head>
<body>
	<div align="center">
		<h1>霉闻趣事</h1>
		<ul>
			<?php
				require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php';
				$query = $dbb->prepare("select * from i_news order by id");
				$query->execute();
				while ($row = $query->fetch(PDO::FETCH_NUM)) {
			?>
		    <li><a href="show.php?id=<?php echo $row[0]; ?>" style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis" title="时间<?php echo $row[3];?>">
		    	<?php echo $row[1];?>
		    </a></li>
			<?php }?>
		</ul>
		</div>
	<div class="home" align="center"><a href="../">首页</a></div>
	
</body>
</html>
