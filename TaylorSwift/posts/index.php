<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Posts</title>
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
	<link rel="stylesheet" href="../css/awesomplete.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" href="../css/animate.css">
	<script src="../js/awesomplete.js"></script>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
          	background-image: linear-gradient(150deg, #00FFFF 0%, #E61AA6 100%);
          	background-attachment:fixed;
		  	width:100%; 
		  	height:100%;
        }
		body {
			letter-spacing:1px; 
		}
		h1{
			letter-spacing:16px;
			margin:24px;
			color:#FFFFFF;
			text-shadow:4px 4px 16px #E61AA6; 
			font-size:60px;
		}
		ul{
			list-style-type:none;
			margin:0;
			padding:0;
			overflow:hidden;
		}
		input,button{
			border: 2px solid #E61AA6;
			color:#8A2BE2;
			outline:none;
			margin:10px;
			padding:10px;
			border-radius:55px;
		}
		input:focus,button:focus{
			border: 2px solid #00FFFF;
		}
		a:link,a:visited{
			transition:0.1s ease;
			margin:1px;
			line-height:30px;
			display:block;
			width:320px;
			height:30px;
			color:#8A2BE2;
			background-color:#00FFFF;
			text-align:center;
			padding:8px;
			text-decoration:none;
			border-radius:55px;
			box-shadow:2px 2px 8px #840B9C;
		}
		a:hover{
			width:350px;
			color:#FFFFFF;
			background-color:#E61AA6;
		}
		a:active{
			padding:5px;
			margin-top:3px;
			margin-bottom:3px;
		}
		.button a{
			color:#FFFFFF;
			box-shadow:2px 2px 8px #840B9C;
			padding:10px;
			background-color:#E61AA6;
		}
        #scroll {
            position:fixed;
            top:70%; 
            right:7%;
        }
        .scrollItem {
        	transition:0.2s ease;
            font-size:40px;
            width:50px; 
            color:#FFFFFF;
            background-color:#E61AA6; 
            cursor:pointer; 
            text-align:center;
            margin:4px;
            padding:3px;
            border-radius: 40px;
            box-shadow:0px 0px 13px 3px #840B9C;
        }
        .scrollItem:hover {
            color:#FFFFFF;
            box-shadow:0px 0px 3px #FFFFFF inset,0px 0px 13px #FFFFFF;
        }
        .scrollItem:active{
            color:#847A83;
            box-shadow:0px 0px 13px #FFFFFF inset,0px 0px 8px #FFFFFF;
        }
        .catalog{
        	width:60%;
        }
        .catalog ul,li{
            margin: 0px;
            list-style: none;
        }
        .catalog ul{
        	align-items:center;
        	width:96%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .catalog li{
        	padding: 10px;
        	width:96%;
            border: 0px;
            text-align: center;
            margin-top: 4px;
            margin-bottom: 4px;
            flex:auto;  /*这是关键*/            
        }
        .catalog a{
        	width: 95%;
        	margin: 10px;
            padding: 0px;
            list-style: none;
        }
        .catalog a:hover{
        	box-shadow:0px 0px 2px #840B9C inset,1px 1px 2px #840B9C;
        }
        ::selection {
            background:#00FFFF;
            color:#ffffff;
        }
        ::-moz-selection {
            background:#00FFFF;
            color:#ffffff;
        }
        ::-webkit-selection {
            background:#00FFFF;
            color:#ffffff;
        }
        #<?php echo $_GET['catalog']; ?>{
			color:#FFFFFF;
			background-color:#E61AA6;
        }
 	</style>
</head>
<body>
	<div align="center">
		<h1>论坛</h1>
		<div class="catalog" align="center">
			<ul>
				<div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0s" data-wow-iteration="1"><li><a href="index.php?catalog=cata1" id="cata1">所有</a></li></div>
				<div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.1s" data-wow-iteration="1"><li><a href="index.php?catalog=cata2" id="cata2">娱乐</a></li></div>
				<div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.2s" data-wow-iteration="1"><li><a href="index.php?catalog=cata3" id="cata3">文史</a></li></div>
				<div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.3s" data-wow-iteration="1"><li><a href="index.php?catalog=cata4" id="cata4">股票</a></li></div>
				<div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.4s" data-wow-iteration="1"><li><a href="index.php?catalog=cata5" id="cata5">体育</a></li></div>
				<div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.5s" data-wow-iteration="1"><li><a href="index.php?catalog=cata6" id="cata6">美食</a></li></div>
				<div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.6s" data-wow-iteration="1"><li><a href="index.php?catalog=cata7" id="cata7">生活</a></li></div>
				<div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.7s" data-wow-iteration="1"><li><a href="index.php?catalog=cata8" id="cata8">星座</a></li></div>
				<div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.8s" data-wow-iteration="1"><li><a href="index.php?catalog=cata9" id="cata9">其他</a></li></div>
			</ul>
		</div>
		<form name="form1" action="redict.php?catalog=<?php echo $_GET['catalog']; ?>" method="post">
			<div style="width:80%;margin:10px">
			<label for="title" style="color:#E61AA6;font-style:italic">搜索Title</label>
			<input id="t" name="title" class="awesomplete" list="mylist" autocomplete="off"/>
			<button style="cursor:pointer;background-color:#E61AA6;color:#FFFFFF" type="submit" onclick="return check()">进入</button>
			</div>
		</form>
		<datalist id="mylist">
			<?php
				require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php';
				$catalog=mb_substr($_GET['catalog'],4,1);
				if($catalog==1){
					$query=$dbb->prepare("select title from i_posts order by id");
				}else{
					$query=$dbb->prepare("select title from i_posts where catalog=:catalog order by id");
					$query->bindValue(':catalog',$catalog,PDO::PARAM_INT);
				}
				$query->execute();
				while ($row = $query->fetch(PDO::FETCH_NUM)) {
					echo '<option>'.$row[0].'</option>';
				}
			?>
		</datalist>  
		<ul>
			<?php
				require_once $_SERVER['DOCUMENT_ROOT'].'./inc/wow.php';
				$query=$dbb->prepare("select * from i_posts order by id");
				$query->execute();
				$check_num=0;
				$delay=0.0;
				while ($row = $query->fetch(PDO::FETCH_NUM)) {
					if(mb_substr($_GET['catalog'],4,1)==$row[4]||mb_substr($_GET['catalog'],4,1)=="1"){
					echo "
					<div class=\"wow $randValue1\" data-wow-duration=\"1s\" data-wow-offset=\"10\" data-wow-delay=\"$delay"."s"."\"  data-wow-iteration=\"1\">	
					<li style=\"padding:5px;\">		    
			    	<a href=\"show.php?id=$row[0]&catalog=$_GET[catalog]\" style=\"overflow:hidden;white-space:nowrap;text-overflow:ellipsis\" title=\"创建于$row[3]\">
			    	$row[1]
			        </a> 
			        </li>
			        </div>";
			        $check_num+=1;
			        if($check_num<6) $delay+=0.1;
			        else $delay=0.1;
			    	}
			    }
			    if($check_num==0)
			    	echo "<li style=\"color:#FFFFFF;text-shadow:4px 4px 6px #00FFFF\">此分栏暂无帖子</li>";
			?>
		</ul>
	</div>
	<div class="button" align="center"><a href="./new.php?catalog=<?php echo $catalog;?>">发布</a></div>
	<div class="button" align="center"><a href="../">首页</a></div>
	<script>
		function check(){
                var obj = document.getElementById("t");
                var str = document.form1.t.value;
                if (str=="") {
                  alert("不能为空");
                  return false;
                }
                else {
                	document.form1.submit();
                }
            }
	</script>
	<?php require_once $_SERVER['DOCUMENT_ROOT'].'./inc/scroll.php'; ?>
	<script opacity='0.7' zIndex="-1" count="100" type="text/javascript" src="../js/canvas-nest.min.js"></script>
	<script src="../js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>
</html>
