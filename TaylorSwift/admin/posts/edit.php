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
        <meta charset="UTF-8"/>
        <title>
            Posts
        </title>
        <script src="../../js/jquery-1.11.0.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
        <link rel="stylesheet" href="../../css/animate.css"/>
        <link rel="stylesheet" href="../../fonts/font/fontCss.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/music.css"/>
        <script>
            $(document).ready(function(){
                //子导航展开收缩
                $(".sewvtop").click(function(){
                    $(this).find("em").removeClass("lbaxztop2").addClass("lbaxztop").parents(".sewv").siblings().children(".sewvtop").find("em").removeClass("lbaxztop").addClass(".lbaxztop2");
                    $(this).next(".sewvbm").toggle().parents(".sewv").siblings().find(".sewvbm").hide();
                });
                /*鼠标离开下拉框关闭*/
                $(".sewv").mouseleave(function(){
                    $(".sewvbm").hide();
                    $(this).children(".sewvtop").find("em").addClass("lbaxztop2");
                });
                //赋值
                $(".sewvbm>li").click(function(){
                    var selva=$(this).text();
                    $('#catalog').val(selva);
                    $(this).parents(".sewvbm").siblings(".sewvtop").find("span").text(selva);
                    $(this).parent("ul").hide();
                    $(this).parents(".sewv").children(".sewvtop").find("em").addClass("lbaxztop2");
                });
            });
            function OnInput (event){
                var x = event.which || event.keyCode;
                if(x==13)
                    event.target.value=event.target.value.replace("\n","")+"<p></p>";
            };
        </script>
        <style type="text/css">
            *{margin: 0;padding: 0;}
            html{
                font-family:"微软雅黑";
            }
            body {
                transition:1s ease;
                min-height: 95vh;
                background:#FFFFFF url(../../images/<?php echo rand(1,10); ?>.jpg) no-repeat fixed top;
                background-size:100%;
                background-attachment:fixed;
            }
            li{
                list-style: none;
            }
            label{
                margin: 8px;
                color:#FFFFFF;
                text-shadow:0px 0px 6px #000000;
            }
            select{
                -webkit-appearance:none;
            }
            ::selection {
                background:#E61AA6;
            }
            ::-moz-selection {
                background:#E61AA6;
            }
            ::-webkit-selection {
                background:#E61AA6;
            }
            input,textarea,select{
                margin:15px;
                outline:none;
                border: 1px solid #00FFFF;
                box-shadow:0px 0px 15px #00FFFF;
            }
            input,textarea{
                background:rgba(0,0,0,0.1);
                color:#FFFFFF;
                letter-spacing:2px;
                font-weight:900;
                font-size:15px;
                text-shadow:0px 0px 6px #000000;
            }
            input:hover,textarea:hover,select:hover{ /*获取焦点改变颜色*/
                box-shadow:0px 0px 10px #E61AA6;
                border: 1px solid #E61AA6;
            }
            h1{
                margin:20px;
                color:#FFFFFF;
                text-shadow:4px 4px 16px #00FFFF; 
                font-size:40px;
            }
            .add{
                background:rgba(0,0,0,0.1);
                width:60%; 
                padding:20px;
                border-radius:50px 50px 50px 50px;
                box-shadow:0px 0px 25px #00FFFF inset;
            }
            .back a:link,a:visited{
                color:#FFFFFF;
                width:150px;
                margin:25px;
                padding:10px;
                background:rgba(0,0,0,0.1);
                display:block;
                font-weight:bold;
                text-align:center;
                text-decoration:none;
                text-transform:uppercase;
                border-radius:25px;
                text-shadow:0px 0px 6px #000000;
                box-shadow:0px 0px 2px 2px #00FFFF,0px 0px 12px 1px #ffffff inset;
            }
            .back a:hover,a:active{
                margin:26px;
                padding:9px;
                box-shadow:0px 0px 1px 2px #E61AA6 inset;
            }
            .button{
                cursor:pointer;
                width: 15%;
                padding: 10px;
                background: none;
                text-shadow:0px 0px 6px #000000;
                border-radius: 20px;
                margin: 0 auto;
                margin-top: 10px;
                color: white;
                box-shadow:0px 0px 16px #00FFFF;
                border:1px solid #00FFFF;
            }
            .button:hover {
                box-shadow:0px 0px 16px #E61AA6;
                border:1px solid #E61AA6;
            }
            .sewv{position: relative;width: 100px;display: inline-block;vertical-align: middle;}
            .sewvtop{width:100%;height:23px;border: 1px #00FFFF solid;cursor:pointer;border-radius:12px;overflow: hidden;box-shadow:2px 2px 8px #00FFFF;}
            .sewvtop:hover{border:1px #E61AA6 solid;box-shadow:2px 2px 8px #E61AA6;}
            .sewvtop>span{float:left;width:70%;height:23px;white-space:pre;text-overflow:ellipsis;overflow:hidden;font-size: 12px;line-height:22px;color:#FFFFFF;text-shadow:4px 4px 16px #00FFFF;padding:0 5px;vertical-align: middle;}
            .sewvtop>em{float:right;width: 20px;height: 20px;vertical-align: middle;}
            .sewvbm{width: 100%;position: absolute;left: 0;top: 25px;display:none;border: 1px #D9D9D9 solid;border-radius:2px;background:#ffffff;}
            .sewvbm>li{white-space:pre;text-overflow:ellipsis;overflow:hidden;background:#ffffff;cursor:pointer;width:95%;font-size: 12px;color: #666666;padding-left:5px;}
            .sewvbm>li:hover{background: #00FFFF;color: #ffffff;}
            .lbaxztop{animation: rotatete 0.3s linear forwards;}
            .lbaxztop2{animation: rotatete2 0.3s linear forwards;}
            @keyframes rotatete{
                from{transform: rotate(0deg);}
                to{transform: rotate(180deg);}
            }
            @keyframes rotatete{
                from{transform: rotate(0deg);}
                to{transform: rotate(180deg);}
            }
            @-moz-keyframes rotatete2{
                from{transform: rotate(180deg);}
                to{transform: rotate(0deg);}
            }
            @keyframes rotatete2{
                from{transform: rotate(180deg);}
                to{transform: rotate(0deg);}
            }
        </style>
    </head>
    <body>
        <div align="center">
            <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'./inc/db.php';
                $id    = $_GET['id'];
                $query=$dbb->prepare("select * from i_posts where id = :id");
                $query->bindValue(':id',$id,PDO::PARAM_INT);
                $query->execute();
                $post  = $query->fetchObject();
                switch ($post->catalog) { 
                    case 2: 
                        $catalog="娱乐";
                        break; 
                    case 3: 
                        $catalog="文史"; 
                        break; 
                    case 4: 
                        $catalog="股票";
                        break; 
                    case 5: 
                        $catalog="体育"; 
                        break; 
                    case 6: 
                        $catalog="美食"; 
                        break; 
                    case 7: 
                        $catalog="生活"; 
                        break; 
                    case 8: 
                        $catalog="星座"; 
                        break; 
                    case 9: 
                        $catalog="其他"; 
                        break; 
                    };
                ?>
            <h1>
                编辑帖子
            </h1>
            <div class="add">
                <form name="form1" method="post" action="update.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                    <input type='text' style='display:none'/>
                    <input type="hidden" id="catalog" name="catalog" value="<?php echo $catalog; ?>">
                    <label for="title">
                        title
                    </label>
                    <input type="text" id="title" name="title" style="width:60%;padding:4px;text-align:center;border-radius:15px" value="<?php echo $post->title; ?>" />
                    <br/>
                    <label for="body">
                        Body
                    </label>
                    <textarea id="body" rows="4" name="body" style="width:70%;resize:none;padding:12px;border-radius:35px;overflow:hidden" onkeydown="OnInput (event)"><?php echo $post->body; ?></textarea>
                    <br/>
                    <input type="file" name="file" onchange="PreviewImage(this,'imgHeadPhoto','divPreview');" style="width:200px" />
                    <div id="divPreview">
                        <img id="imgHeadPhoto" src="noperson.jpg" style="width: 400px; border: solid 1px #d2e2e2;"
                            alt="" />
                    </div>
                    <label for="catalog">
                        catalog
                    </label>
                    <div class="sewv">
                        <div class="sewvtop">
                            <span><?php echo $catalog; ?></span>
                            <em>
                                <img src="../../images/selebom.png"/>
                            </em>
                        </div>
                        <ul class="sewvbm">
                            <li>其他</li>
                            <li>娱乐</li>
                            <li>文史</li>
                            <li>股票</li>
                            <li>教育</li>
                            <li>体育</li>
                            <li>美食</li>
                            <li>生活</li>
                            <li>星座</li>
                        </ul>
                    </div>
                    <div class="button" name="submit" onclick="check()">
                        提交
                    </div>
                </form>
            </div>
        </div>
        <div class="back" align="center">
            <a href="./">
                返回
            </a>
        </div>
        <script type="text/javascript" src="../../js/canvas-nest.min.js"></script>
        <script type="text/javascript" src="../../js/textinputheight.js"></script>
        <script>
            var text = document.getElementById("body");//text自适应
            autoTextarea(text);                        //
            function check(){
                    var obj1 = document.getElementById("title");
                    var str1 = document.form1.title.value;
                    var obj2 = document.getElementById("body");
                    var str2 = document.form1.body.value;
                    if (str1.replace(/\s/g, "")=="") {
                      alert("标题不能为空!");
                    }
                    else if (str2.replace(/\s/g, "")=="") 
                      alert("内容不能为空!");
                    else {
                      document.form1.submit();
                    }
            }
        </script>
        <div class="music-bg" style="height: 100%;filter: blur(100px);transition:all 0.3s" id="music-bg">
            <div class="music-mask">
            </div>
        </div>
        <script type="text/javascript" src="../../js/music.js"></script>
        <script type="text/javascript">
            window.onload = function(){
                MC.music({
                    hasAjax:false,
                    left:'89%',
                    bottom:'85%',
                    musicChanged:function(ret){
                        // alert(ret.url);
                        // getMusic_buffer(ret.url);
                        // return;
                        var data = ret.data;
                        var index = ret.index;
                        var imageUrl = data[index].img_url;
                        
                        var music_bg = document.getElementById('music-bg');
                        music_bg.style.background = 'url('+imageUrl+')no-repeat';
                        music_bg.style.backgroundSize = 'cover';
                        music_bg.style.backgroundPosition = 'center 30%';
                    },       
                    getMusicInfo:function(data){                      
                    },           
                    musicPlayByWebAudio:function(ret){                      
                    },
                });
                var i=0;
                var j=0;
                function time(){
                    j=i%11+1;
                    document.body.style.backgroundImage="url(../../images/"+j+".jpg)";
                    i++; 
                }
                setInterval(time,12000);//setInterval()函数，按照指定的周期（按毫秒计）来调用函数或表达式
            }
        </script>
        <script src="../../js/uploadpic.js"></script>
    </body>
</html>
