<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['visitor'])) {
    $_SESSION['visitor'] = time() . "" . rand(0, 9);
}
$checkuser=isset($_SESSION['userid']);
require_once $_SERVER['DOCUMENT_ROOT'].'../inc/pager.func.php';
if (!isset($_GET['page'])) $_GET['page']=1;
if(!isset($_GET['catalog'])) $_GET['catalog']="cata1";
?>
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
            margin:20px;
            color:#FFFFFF;
            text-shadow:4px 4px 0px #E61AA6;
            font-size:50px;
        }
        ul{
            list-style-type:none;
            margin:0;
            margin-bottom:16px;
            padding:0;
            overflow:hidden;
        }
        a{
            text-decoration:none;
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
        .menu:link,.menu:visited,#list:link,#list:visited{
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
            border-radius:55px;
            box-shadow:2px 2px 8px #840B9C;
        }
        .menu:hover,#list:hover{
            width:350px;
            color:#FFFFFF;
            background-color:#E61AA6;
        }
        #list:active{
            padding:5px;
            margin-top:3px;
            margin-bottom:3px;
        }
        .menu:link,.menu:visited{
            line-height:40px;
            color:#FFFFFF;
            margin:5px;
            width:100%;
            height:10px;
            padding:1px;
        }
        .menu:hover{
            height:10px;
        }
        .button{
            margin:20px;
            display:inline;
        }
        .button a{
            width:20%;
            border-radius:10px;
            box-shadow:2px 2px 8px #840B9C;
            padding:10px;
            background-color:#E61AA6;
            color:#FFFFFF;
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
            text-align:center;
            width:96%;
            height:60px;
            display:flex;
            flex-direction:row;
            flex-wrap:wrap;
            justify-content:center;
        }
        .catalog li{
            padding: 10px;
            width:90%;
            border: 0px;
            text-align:center;
            margin: 4px;
            flex:auto;  /*这是关键*/
        }
        .catalog a{
            width: 95%;
            margin: 10px;
            padding: 0px;
            list-style: none;
        }
        .catalog a:hover{
            box-shadow:0px 0px 3px #840B9C inset,1px 1px 2px #840B9C;
        }
        .search{
            width:80%;
            margin:10px;
        }
        ::selection {
            background:#FFFF00;
            color:#ffffff;
        }
        ::-moz-selection {
            background:#FFFF00;
            color:#ffffff;
        }
        ::-webkit-selection {
            background:#FFFF00;
            color:#ffffff;
        }
        #welcome{
            position:fixed;
            left:10px;
            top:-12px;
            background-color:#FFFFFF;
            border-radius:10px;
            box-shadow:0px 0px 1px #000000;
            padding:2px;
        }
        #ssesion{
            margin:0px;
            padding:4px;
            display:inline;
        }
        #user{
            font-size:15px;
            margin:0px;
            padding:4px;
            cursor:pointer;
            background-color:#ffffff;
            color:#4169E1;
            box-shadow:0px 0px 4px #840B9C;
        }
        #user:hover{
            box-shadow:0px 0px 8px #840B9C;
        }
        #visitor{
            color:#E61AA6;
        }
        #pager{
            color:rgb(240,240,240);
            position:fixed;
            right:10px;
            top:0px;
            display:inline;
        }
        #<?php echo $_GET['catalog']; ?>{
            color:#FFFFFF;
            background-color:#E61AA6;
        }
        @media only screen and (max-width: 500px) {
            h1{
                margin-top:30px;
                margin-bottom:0px;
            }
            .catalog{
                margin-left:0px;
                width:85%;
            }
            .catalog ul{
                margin:0px;
                padding:12px;
                width:100%;
                display: inline-flex;
            }
            .catalog li{
                padding:2px;
                width:90%;
            }
            .catalog a{
                width: 90%;
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
            .search{
                width:100%;
                margin:10px;
            }
            .search label,input,button{
                margin:0px;
                padding:6px;
            }
            #welcome{
                position:absolute;
                font-size:90%;
                right:8px;
            }
            #pager{
                box-shadow:0px 0px 1px #000000;
                position:static;
                display:inline-block;
                margin:0px;
                margin-top:20px;
                background-color:#FFFFFF;
                color:#000000;
                padding:6px;
                border-radius:18px;
            }
            #visitor{
                background-color:#FFFF00;
                border-radius:10px;
                text-shadow:1px 1px 0px #840B9C;
            }
        }
     </style>
</head>
<body>
    <?php
        //检查是否登录
        if($checkuser){ ?>
        <p id="welcome">你好用户:<a href="./myposts/" title="我的帖子"><button id="user"><?php echo $_SESSION['username']; ?></button></a>|<a id="ssesion" href="./login/Login.php?action=logout">注销</a></p>
    <?php
        }else{
            echo "<p id=\"welcome\">游客<span id=\"visitor\">".$_SESSION['visitor']."</span>|<a id=\"ssesion\" href=\"./login/\">登录</a></p>";
        }
    ?>
    <div align="center">
        <h1>论坛</h1>
        <div class="catalog" align="center">
            <ul>
                <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0s" data-wow-iteration="1"><li><a class="menu" href="?catalog=cata1" id="cata1">所有</a></li></div>
                <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.1s" data-wow-iteration="1"><li><a class="menu" href="?catalog=cata2" id="cata2">娱乐</a></li></div>
                <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.2s" data-wow-iteration="1"><li><a class="menu" href="?catalog=cata3" id="cata3">文史</a></li></div>
                <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.3s" data-wow-iteration="1"><li><a class="menu" href="?catalog=cata4" id="cata4">股票</a></li></div>
                <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.4s" data-wow-iteration="1"><li><a class="menu" href="?catalog=cata5" id="cata5">体育</a></li></div>
                <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.5s" data-wow-iteration="1"><li><a class="menu" href="?catalog=cata6" id="cata6">美食</a></li></div>
                <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.6s" data-wow-iteration="1"><li><a class="menu" href="?catalog=cata7" id="cata7">生活</a></li></div>
                <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.7s" data-wow-iteration="1"><li><a class="menu" href="?catalog=cata8" id="cata8">星座</a></li></div>
                <div class="wow flipInX" data-wow-duration="1s" data-wow-offset="10" data-wow-delay="0.8s" data-wow-iteration="1"><li><a class="menu" href="?catalog=cata9" id="cata9">其他</a></li></div>
            </ul>
        </div>
        <form name="form1" action="redict.php?catalog=<?php echo $_GET['catalog']; ?>&page=<?php echo $_GET['page']; ?>" method="post">
            <div class="search">
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
                    $sql="select * from i_posts order by id";
                }else{
                    $sql="select * from i_posts where catalog=$catalog order by id";
                }
                $query=$dbb->prepare($sql);
                $query->execute();
                while ($posts = $query->fetchObject()) {
                    echo '<option>'.$posts->title.'</option>';
                }
                $page_arr=pager_query($sql,$nav_html,$_GET['page'],7);
            ?>
        </datalist>
        <ul>
            <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'./inc/wow.php';
                $query=$dbb->prepare($page_arr['sql']);
                $query->execute();
                $check_num=0;
                $delay=0.0;
                while ($posts = $query->fetchObject()) {
                    echo "
                    <div class=\"wow $randValue1\" data-wow-duration=\"1s\" data-wow-offset=\"10\" data-wow-delay=\"$delay"."s"."\"  data-wow-iteration=\"1\">
                    <li style=\"padding:5px;\">
                    <a id=\"list\" href=\"show.php?id=$posts->id&catalog=$_GET[catalog]&page=$_GET[page]\" style=\"overflow:hidden;white-space:nowrap;text-overflow:ellipsis\" title=\"创建于$posts->created_at\">
                    $posts->title
                    </a>
                    </li>
                    </div>";
                    $check_num+=1;
                    if($check_num<6) $delay+=0.1;
                    else $delay=0.1;
                }
                if($check_num==0)
                    echo "<li style=\"color:#FFFFFF;text-shadow:4px 4px 6px #00FFFF\">此分栏暂无帖子</li>";
            ?>
        </ul>
    <div class="button" align="center"><a href="./new.php?catalog=<?php echo $catalog;?>&cata=<?php echo $_GET['catalog'];?>">发布</a></div>
    <div class="button" align="center"><a href="javascript:;" onclick="window.open('../','swift');window.opener=null;window.open('','_self');window.close();">首页</a></div>
    <br>
    <?php echo $page_arr['nav_html']; ?>
    </div>
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