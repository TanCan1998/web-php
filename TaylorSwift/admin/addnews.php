<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>新增</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/bootstrap-float-label.css">
	<link rel="stylesheet" type="text/css" href="../css/shijian.css"/>
	<style type="text/css">
		html{
          	font-family:"微软雅黑";
        }
		body {
		  min-height: 100vh;
		  background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
		  background-color:#20CECE;
		}
		.body{
			/*border:4px solid #006666; */
			width:40%; 
			height:60%;
			padding:20px;
			background-color:#FFFFFF;
			border-radius:30px 30px 30px 30px;
			box-shadow: 8px 8px  #BDE61A;
		}
		h1{
			letter-spacing:4px;
		}
		a:link,a:visited{
			color:#BDE61A;
			text-decoration:line-through;
		}
		a:hover,a:active{
			color:#28a745;
		}
		input,textarea{
			text-indent:2.5em;
		}
	</style>
	<script>
		function OnInput (event){
            var x = event.which || event.keyCode;
            if(x==13)
                event.target.value=event.target.value.replace("\n","")+"<p></p>";
        };
	</script>
</head>
<body>
	<div align="center">
		<div class="body">
			<?php
				session_start();  
		   		//检测是否登录 
				if(!isset($_SESSION['userid'])){  
		    		exit('非法访问!');
				}
				require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
			?>
			<h1>新增新闻</h1>

			<form name="form1" action="savenews.php" method="post">
				<label for="time">Time</label>
				<input type="text" name="time" id="timein" value="<?php echo date('Y-m-d H:i',time()); ?>" style="outline:none;border: 1px solid #BDE61A;text-align:center;border-radius:10px;color:#BDE61A"/>
                <div class="jsbox"></div>
				<div class="form-group floating-control-group">
				<label for="txtFloatingUsername">Title</label>
				<input type="text" class="form-control" id="txtFloatingUsername" name="title" onkeydown='if(event.keyCode==13) return false;'/>
				</div>
				<div class="form-group floating-control-group">
				<label for="txtFloatingComments">Body</label>
				<textarea class="form-control" id="txtFloatingComments" rows="12" name="body" style="resize:none" onkeydown="OnInput (event)"></textarea>
				</div>
				<button type="submit" class="btn btn-primary" onclick="return check()"> 提 交 </button>
			</form>
			<a href="./newslist.php">取消</a>
		</div>
	</div>
	<script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="../js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-float-label.js"></script>
	<script src="../js/jquer_shijian.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function(){
			$('.form-group').floatingLabel();
		})
		//默认点击显示时间
    	$("#timein").shijian()
	</script>
	<script>
        function check(){
            var obj1 = document.getElementById("txtFloatingUsername");
            var str1 = document.form1.txtFloatingUsername.value;
            var obj2 = document.getElementById("txtFloatingComments");
            var str2 = document.form1.txtFloatingComments.value;
            if (str1.replace(/\s/g, "")=="") {
              	alert("标题不能为空!");
            }
            else if (str2.replace(/\s/g, "")=="") 
              	alert("内容不能为空!");
            else {
              	document.form1.submit();
            }
            return false;
        }
    </script>
</body>
</html>