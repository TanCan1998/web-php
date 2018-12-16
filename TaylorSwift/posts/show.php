<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['username'])){
    $name=$_SESSION['username'];
}
else{
    $name="游客".$_SESSION['visitor'];
}
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>
            Posts
        </title>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
        <link rel="stylesheet" href="../css/animate.css">
        <style type="text/css">
            body { width:100%; height:100%;overflow-x:hidden; }
            html{
                font-family:"微软雅黑";
                background:#FFFFFF url(../images/background1.jpg) no-repeat fixed top;
                background-size:100%;
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
    		.myul{
                list-style-type:none;
                margin:0;
                padding:0;
                overflow:hidden;
            }
            label{
                margin: 8px;
                color:#8A2BE2;
            }
            .myspan{
                width:120px;
                color:#8A2BE2;
                font-size:12px;
                font-style:italic;
                display:inherit;
                background-color:rgba(255,255,255,0.8);
                border-radius:60px;
                overflow:hidden;
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
                transition:1s linear;
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
    		.bbutton a:link,a:visited{
                transition:0.5s ease;
    			color:#8A2BE2;
    			width:140px;
                margin:16px;
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
            .bbutton a:hover,a:active{
                box-shadow:0px 0px 4px 1px #840B9C inset,0px 0px 8px 0px #840B9C;
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
            #user{
                font-size:78%;
                font-style:italic;
                color:#E61AA6;
                text-shadow:1px 1px 16px #00FFFF; 
            }
            @media only screen and (max-width: 500px) {
                html{
                    background:#FFFFFF url(../images/mbackground.png) no-repeat fixed top;
                    background-size:105%;
                }
                body{
                    width:95%;
                }
                .post{
                    margin:0px;
                    width:80%;
                    margin-bottom:13px;
                }
                .comment{
                    margin:0px;
                    width:80%;
                    margin-bottom:13px;
                }
                .add{
                    margin:0px;
                    width:80%;
                    margin-bottom:13px;
                }
                #scroll {
                    top:65%; 
                    right:1%;
                }
                .scrollItem{
                    margin:0px;
                    width:40px;
                    height:40px;
                    font-size:30px;
                }
            }
        </style>
        <script src="../js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
    </head>
<body>
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'./inc/scroll.php';
    $id = $_GET['id'];
    $query=$dbb->prepare("select p.*,u.nickname from i_posts p,i_users u
                            where p.id = :id and p.author_id = u.id");
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    $posts = $query->fetchObject();
?>
<div align="center">
    <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-iteration="1">
    <div class="post" id="post">
        <h1>帖子</h1>
        <h2><?php echo $posts->title;?></h2>
        <span class="myspan" style="margin:0px;font-size:14px;color:#E61AA6;font-style:italic">
            <?php
                switch ($posts->catalog) {
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
        </span>
        <span class="myspan" style="margin:0px;font-size:14px;color:#82acf2;font-style:italic">作者:<?php echo $posts->nickname; ?></span>
        <span class="myspan"><?php echo date('Y-m-d H:i',strtotime($posts->created_at)); ?></span>
        <div class="content" style="text-align:left;text-indent:2em;letter-spacing:2px;font-weight:300"><?php echo $posts->body ?></div>
    </div>
    </div>
    <div class="box1"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"><img src="../images/--.gif"></div>
    <ul class="myul">
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'./inc/wow.php';
            $query = $dbb->prepare("select * from i_comments where post_id = :post_id order by id");
            $query->bindValue(':post_id',$id,PDO::PARAM_INT);
            $query->execute();
            while($comment = $query->fetchObject()){
        ?>
        <div class="wow <?php echo $randValue; ?>" data-wow-duration="1.5s" data-wow-offset="10"  data-wow-iteration="1">
        <div class="comment" style="box-shadow: 8px 8px  rgb(<?php echo rand(0,255).','.rand(0,255).','.rand(0,255); ?>)">
            <li>
                <p id="user">用户:<?php echo $comment->nickname;?></p>
                <p style="letter-spacing:2px;font-weight:300"><?php echo $comment->body;?></p>
                <span class="myspan"><?php echo date('Y-m-d H:i',strtotime($comment->created_at));?></span>
            </li>
        </div>
        </div>
        <br>
        <?php } ?>
    </ul>
<?php if(!isset($_GET['from'])) {?>
    <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-iteration="1">
    <div class="add" id="add">
        <h2 style="color:#E61AA6;text-shadow:1px 1px 2px #00FFFF">添加评论</h2>
        <form name="form1" method="post" action="update.php?catalog=<?php echo $_GET['catalog']; ?>&page=<?php echo $_GET['page']; ?>">
            <input type="hidden" name="post_id" value = "<?php echo $id; ?>"/>
            <input type="hidden" name="time" value = "<?php echo date('Y-m-d H:i:s',time()); ?>"/>
            <input type='text' style='display:none'/>
            <label for="nickname">Name</label>
            <input type="text" id="nickname" readonly="readonly" name="nickname" style="width:60%;padding:4px;text-align:center;border-radius:15px;cursor:default;" value="<?php echo $name; ?>"/>
            <br>
            <br>
            <label for="body">Body</label>
            <textarea id="body" rows="4" name="body" style="width:70%;resize:none;padding:12px;border-radius:35px;overflow:hidden;"></textarea>
            <div class="button" name="submit" onclick="check()">提交</div>
        </form>
    </div>
    </div>
<?php } ?>
    <div class="bbutton">
<?php
if(isset($_GET['from'])) {$backurl="./myposts/";$urlcheck='&from=1';}
else {$backurl="./index.php?catalog=$_GET[catalog]&page=$_GET[page]";$urlcheck='';}
?>
        <a href="<?php echo $backurl; ?>">
            返回
        </a>
    </div>
<?php
if(mb_substr($_GET['catalog'],4,1)!=1){
    if(!isset($_GET['from'])){
        $catacheck='and catalog='.mb_substr($_GET['catalog'],4,1);
    }else{
        $catacheck='and author_id='.$_SESSION['userid'];
    }
}
else{
    if(!isset($_GET['from'])){
        $catacheck='';
    }else{
        $catacheck='and author_id='.$_SESSION['userid'];
    }
}
$sql  = 'select id,title from i_posts where id < :id '.$catacheck.' order by id desc limit 1';
$query = $dbb->prepare($sql);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
$post = $query->fetchObject();
if($post!=null){
echo   "<div class=\"bbutton\">
        <a href=\"?id=$post->id&catalog=$_GET[catalog]&page=$_GET[page]$urlcheck\" title=\"$post->title\">
            上一篇
        </a>
    </div>";
}
$sql  = 'select id,title from i_posts where id > :id '.$catacheck.' order by id asc limit 1';
$query = $dbb->prepare($sql);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
$post = $query->fetchObject();
if($post!=null){
echo   "<div class=\"bbutton\">
        <a href=\"?id=$post->id&catalog=$_GET[catalog]&page=$_GET[page]$urlcheck\" title=\"$post->title\">
            下一篇
        </a>
    </div>";
}
?>
</div>
<script type="text/javascript" src="../js/canvas-nest.min.js"></script>
<script type="text/javascript" src="../js/textinputheight.js"></script>
<script>
    var text = document.getElementById("body");
    autoTextarea(text);
    function check(){
            var obj = document.getElementById("body");
            var str = document.form1.body.value;
            if (str.replace(/\s/g, "")==""){
              alert("内容不能为空!");
            }else {
              document.form1.submit();
            }
    }
</script>
<?php 
$query=$dbb->prepare("select count(*) from i_pic where post_id=:id");
$query->bindValue(':id',$id,PDO::PARAM_STR);
$query->execute();
$rows = $query->fetch();
$rowCount = $rows[0];
if($rowCount>0){
    echo "<script>
    window.onload = function(){
    var picArr = new Array();";
    $query=$dbb->prepare("select * from i_pic where post_id= :id");
    $query->bindValue(':id',$id,PDO::PARAM_STR);
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_NUM)) {
        echo "picArr.push(\"$row[1]\");";
    }
    echo   
    "var i=0;
    var len=picArr.length;
    $(\"#post\").css(\"background\",\"#ffffff url(./pic/\"+picArr[i%len]+\") no-repeat center\");
    $(\"#post\").css(\"background-size\",\"120%\");
    $(\"#post\").css(\"color\",\"#ffffff\");
    $(\"#post\").css(\"text-shadow\",\"0px 0px 1px #000000,0px 0px 2px #ffffff\");
    i++;
    function time(){
        $(\"#post\").css(\"background\",\"#ffffff url(./pic/\"+picArr[i%len]+\") no-repeat center\");
        i++; 
    }
    setInterval(time,6000);}
    </script>
    ";//setInterval()函数，按照指定的周期（按毫秒计）来调用函数或表达式
}
?>

</body>
</html>
