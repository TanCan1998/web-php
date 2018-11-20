<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            Posts
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
        <link rel="stylesheet" href="../css/animate.css">
        <style type="text/css">
            body { width:100%; height:100%;overflow-x:hidden; }
            html{
                font-family:"微软雅黑";
                background:#FFFFFF url(../images/background1.jpg) no-repeat fixed top;
                background-size:1270px;
            }
    		ul{
                list-style-type:none;
                margin:0;
                padding:0;
                overflow:hidden;
            }
            label{
                margin: 8px;
                color:#8A2BE2;
            }
            span{
                color:#8A2BE2;
                font-size:12px;
                font-style:italic;
            }
            input,textarea{
                outline:none;
                border: 1px solid #00FFFF;
                box-shadow:2px 2px 1px #00FFFF;
            }
            input:hover,textarea:hover{ /*获取焦点改变颜色*/
                box-shadow:2px 2px 8px #E61AA6;
                border: 1px solid #E61AA6;
            }
            h1{
                margin:0px;
                color:#E61AA6;
                text-shadow:4px 4px 16px #00FFFF; 
                font-size:40px;
            }
            .box1 img{
                width:6%;
                margin-bottom:20px;
            }
            .post{
                width:60%; 
                margin:25px;
                padding:20px;
                background-color:#FFFFFF;
                border-radius:50px 50px 50px 50px;
                box-shadow: 8px 8px  #00FFFF;
            }
            .comment{
                width:40%; 
                padding:25px;
                background-color:#FFFFFF;
                border-radius:65px 65px 65px 65px;
            }
            .add{
                width:40%; 
                padding:15px;
                background-color:#FFFFFF;
                border-radius:65px 65px 65px 65px;
                box-shadow: 8px 8px  #E61AA6;
            }
    		.back a:link,a:visited{
                transition:0.5s ease;
    			color:#8A2BE2;
    			width:140px;
                margin:26px;
                padding:10px;
    			background-color:#FFEC8B;
                display:block;
                font-weight:bold;
                text-align:center;
                text-decoration:none;
                text-transform:uppercase;
                border-radius:25px;
                box-shadow:0px 0px 12px 2px #840B9C;
    		}
            .back a:hover,a:active{
                box-shadow:0px 0px 4px 1px #840B9C inset;
            }
            .button{
                cursor:pointer;
                width: 72px;
                padding: 10px;
                background-color: #E61AA6;
                border-radius: 20px;
                margin: 0 auto;
                margin-top: 10px;
                color: white;
            }
            .button:hover {
                background-color:#A61ABD;
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
                color:#A61ABD;
                background-color:#FFEC8B; 
                cursor:pointer; 
                text-align:center;
                margin:4px;
                padding:3px;
                border-radius: 40px;
                box-shadow:0px 0px 13px 3px #840B9C;
            }
            .scrollItem:hover {
                color:#41ADFF;
                box-shadow:0px 0px 13px #00FFFF;
            }
            .scrollItem:active{
                color:#A61ABD;
                box-shadow:0px 0px 13px #00FFFF inset,0px 0px 8px #00FFFF;
            }
        </style>
        <script src="../js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
    </head>
    <body>
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
            require_once $_SERVER['DOCUMENT_ROOT'].'../inc/scroll.php';
            $id = $_GET['id'];
            $query=$dbb->prepare("select * from i_posts where id = :id");
            $query->bindValue(':id',$id,PDO::PARAM_INT);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_NUM);
        ?>
        <div align="center">
            <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-iteration="1">
            <div class="post">
                <h1>帖子</h1>
                <h2><?php echo $row[1];?></h2>
                <p style="margin:0px;font-size:14px;color:#E61AA6;font-style:italic">
                    <?php
                        switch ($row[4]) {
                            case 2:
                                echo "娱乐";
                                break;
                            case 3:
                                echo "文史";
                                break;
                            case 4:
                                echo "股票";
                                break;
                            case 5:
                                echo "体育";
                                break;
                            case 6:
                                echo "美食";
                                break;
                            case 7:
                                echo "生活";
                                break;
                            case 8:
                                echo "星座";
                                break;
                            case 9:
                                echo "其他";
                                break;
                        }; 
                    ?>
                </p>
                <span><?php echo date('Y-m-d H:i',strtotime($row[3])); ?></span>
                <div style="text-align:left;text-indent:2em;letter-spacing:2px;font-weight:300"><?php echo $row[2] ?></div>
            </div>
            </div>
            <div class="box1"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"></div>
            <ul>
                <?php
                    require_once $_SERVER['DOCUMENT_ROOT'].'../inc/wow.php';
                    $query = $dbb->prepare("select * from i_comments where post_id = :post_id order by id");
                    $query->bindValue(':post_id',$id,PDO::PARAM_INT);
                    $query->execute();
                    while($row = $query->fetch(PDO::FETCH_NUM)){
                ?>
                <div class="wow <?php echo $randValue; ?>" data-wow-duration="1.5s" data-wow-offset="10"  data-wow-iteration="1">
                <div class="comment" style="box-shadow: 8px 8px  rgb(<?php echo rand(0,255).','.rand(0,255).','.rand(0,255); ?>)">
                    <li>
                        <p><?php echo $row[1];?></p>
                        <p style="letter-spacing:2px;font-weight:300"><?php echo $row[2];?></p>
                        <span><?php echo date('Y-m-d H:i',strtotime($row[3]));?></span>
                    </li>
                </div>
                </div>
                <br>
                <?php } ?>
            </ul>
            <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-iteration="1">
            <div class="add" id="add">
                <h2 style="color:#E61AA6;text-shadow:1px 1px 2px #00FFFF">添加评论</h2>
                <form name="form1" method="post" action="commentupdate.php?catalog=<?php echo $_GET['catalog']; ?>">
                    <input type="hidden" name="post_id" value = "<?php echo $id; ?>"/>
                    <input type="hidden" name="time" value = "<?php echo date('Y-m-d H:i:s',time()); ?>"/>
                    <input type='text' style='display:none'/>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" style="width:60%;padding:4px;text-align:center;border-radius:15px;"/>
                    <br>
                    <br>
                    <label for="body">Body</label>
                    <textarea id="body" rows="4" name="body" style="width:70%;resize:none;padding:12px;border-radius:35px;overflow:hidden;"></textarea>
                    <div class="button" name="submit" onclick="check()">提交</div>
                </form>
            </div>
            </div>
            <div class="back">
                <a href="posts.php?catalog=<?php echo $_GET['catalog']; ?>">
                    返回
                </a>
            </div>
        </div>
        <script type="text/javascript" src="../js/canvas-nest.min.js"></script>
        <script type="text/javascript" src="../js/textinputheight.js"></script>
        <script>
            var text = document.getElementById("body");
            autoTextarea(text);
            function check(){
                    var obj1 = document.getElementById("title");
                    var str1 = document.form1.title.value;
                    var obj2 = document.getElementById("body");
                    var str2 = document.form1.body.value;
                    if (str1.replace(/\s/g, "")==""&&str2.replace(/\s/g, "")==""){
                      alert("标题和内容不能都为空!");
                    }else {
                      document.form1.submit();
                    }
            }
        </script>
    </body>
</html>
