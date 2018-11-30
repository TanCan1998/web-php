<?php  
    session_start();  
      //检测是否登录  
    if(!isset($_SESSION['userid'])){  
      exit('非法访问!'); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>管理图片</title>
	<script src="../../../js/jquery.min.js"></script>
	<style>
        body{
			transition:2s ease;
            font-family:"微软雅黑";
            background:#A0EEE1;
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
        .main{
        	transition:2s ease;
        	border-radius:30px;
        	box-shadow:0px 0px 5px #808080;
        	margin-top:40px;
        	margin-left:15%;
        	width:70%;
        	background:#ffffff;
        }
		table{
            padding:10px;
        	width:100%;
        }
        th{
            height:40px;
            transition:2s ease;
            background:#A0EEE1;
        	font-size:20px;
            border-radius:20px;
        }
        td{
            height:200px;
            border-radius:10px;
        	text-align:center;
        }
        .Odd{
        	transition:2s ease;
            background-image:linear-gradient(135deg, rgba(255, 255, 255, .15) 20%, transparent 20%,transparent 40%,  rgba(255, 255, 255, .15) 40%, rgba(255, 255, 255, .15) 60%, transparent 60%, transparent 80%,rgba(255, 255, 255, .15) 80%, transparent);
        	background-color:#A0EEE1;
        }
        .Even{
            background-image:linear-gradient(135deg, rgba(255, 255, 255, .15) 20%, transparent 20%,transparent 40%,  rgba(255, 255, 255, .15) 40%, rgba(255, 255, 255, .15) 60%, transparent 60%, transparent 80%,rgba(255, 255, 255, .15) 80%, transparent);
            background-color:#D9D9D8;
        }
        a{
            text-decoration:none;
        }
        img{
            padding:10px;
            height:90%;
        }
        #button{
            cursor:pointer;
            border-style:none;
            box-shadow:1px 1px 6px #000000;
            border-radius:100px;
        }
        #button:hover{
            box-shadow:1px 1px 3px #000000,-1px -1px 3px #000000 inset;
        }
        .back{
            position:fixed;
            top:80%; 
            right:5%;
            transition:0.2s ease;
            font-size:20px;
            width:70px;
            height:30px; 
            color:#D1BA74;
            background-color:#D9D9D8; 
            cursor:pointer; 
            text-align:center;
            margin:4px;
            padding:3px;
            border-radius: 10px;
            box-shadow:0px 0px 13px 3px #7A7A7A;
        }
        .back:hover{
            box-shadow:0px 0px 10px 3px #7A7A7A,0px 0px 3px 1px #7A7A7A inset;
        }
        @media only screen and (max-width: 500px) {
            html{
                height:100%;
                width:300px;
            }
            .main{
                margin:0px;
                width:336px;
            }
            .back{
                padding:15px;
                top:70%; 
                right:4%;
                width:19px;
                height:42px; 
                font-size:16px;
                border-radius:60px;
                font-weight:900;
                letter-spacing:0px;
            }
            table{
                width:335px;
            }
            td{
                width:160px;
                height:100px;
            }
        }
    </style>
</head>
<body>
	<div class="main" align="center">
		<table>
			<thead>
				<tr>
					<th style="width:60%">图片</th>
					<th style="width:25%">所属帖子</th>
					<th style="width:15%">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					require_once $_SERVER['DOCUMENT_ROOT'].'./inc/db.php';
					$query=$dbb->prepare("select path,title,i_pic.id from i_pic,i_posts where post_id=i_posts.id order by post_id,i_pic.id desc");
					if(!$query->execute()){
						echo '<div align="center">
                <p style="letter-spacing:16px;margin-top:288px;color:#FFFFFF;text-shadow:4px 4px 16px #000000;font-size:60px;font-weight:900">出错！</p>
            </div>';
					}else{
						$i=1;
						while($row=$query->fetch(PDO::FETCH_NUM)){
							$imgPath="../../../posts/pic/".$row[0];
							if($i%2==1){
								echo '<tr class="Odd">';
							}else{
								echo '<tr class="Even">';
							}
							echo "<td><a href=\"$imgPath\"><img src=\"$imgPath\"></a></td>";
							echo "<td>$row[1]</td>";
							echo "<td id=\"button\" onclick=\"conf($row[2])\"><img style=\"width:40%;height:26%\" src=\"../../../images/delete.png\"></td>";
							echo '</tr>';
							$i++;
						}
					}
				?>
			</tbody>
		</table>
    </div>
    <div class="back" onclick="location='../../manage.php'">返回</div>
	<script type="text/javascript">
        window.onload = function(){
        	var i=0;
            function time(){
            	var arr=["19CAAD","8CC7B5","A0EEE1","BEE7E9","BEEDC7","D6D5B7","D1BA74","E6CEAC","ECAD9E","F4606C"];
                document.body.style.background="#"+arr[i%10];
                $(".main").css("text-shadow","2px 2px 6px #"+arr[i%10]);
                $(".Odd").css("background-color","#"+arr[i%10]);
                $("th").css("background","#"+arr[i%10]);
                i++;
            }
            setInterval(time,6000);//setInterval()函数，按照指定的周期（按毫秒计）来调用函数或表达式
        }
    </script>
    <script>
        function conf(picId){
            if(confirm("确认删除此图片？")){
                window.location.href="delete.php?id="+picId;
            }
        }
    </script>
</body>
</html>