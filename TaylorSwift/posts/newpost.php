<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            Posts
        </title>
        <script src="../js/jquery-1.11.0.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
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
        </script>
        <style type="text/css">
            *{margin: 0;padding: 0;}
            html{
                font-family:"微软雅黑";
            }
            body {
                min-height: 95vh;
                background:#FFFFFF url(../images/background2.jpg) no-repeat fixed center;
                background-size:1280px 580px;
                background-attachment:fixed;
            }
            li{
                list-style: none;
            }
            label{
                margin: 8px;
                color:#8A2BE2;
            }
            select{
                -webkit-appearance: none;
            }
            input,textarea,select{
                margin:15px;
                outline:none;
                border: 1px solid #00FFFF;
                box-shadow:2px 2px 5px #00FFFF;
            }
            input:hover,textarea:hover,select:hover{ /*获取焦点改变颜色*/
                box-shadow:2px 2px 8px #E61AA6;
                border: 1px solid #E61AA6;
            }
            h1{
                margin:20px;
                color:#E61AA6;
                text-shadow:4px 4px 16px #00FFFF; 
                font-size:40px;
            }
            .add{
                width:60%; 
                padding:20px;
                background-color:#FFFFFF;
                border-radius:50px 50px 50px 50px;
                box-shadow: 8px 8px  #E61AA6;
            }
            .back a:link,a:visited{
                color:#8A2BE2;
                width:150px;
                margin:25px;
                padding:10px;
                background-color:#FFEC8B;
                display:block;
                font-weight:bold;
                text-align:center;
                text-decoration:none;
                text-transform:uppercase;
                border-radius:25px 25px 25px 25px;
                box-shadow:0px 0px 2px 2px #840B9C;
            }
            .back a:hover,a:active{
                margin:26px;
                padding:9px;
                box-shadow:0px 0px 1px 2px #840B9C inset;
            }
            .button{
                width: 15%;
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
            .sewv{position: relative;width: 100px;display: inline-block;vertical-align: middle;}
            .sewvtop{width:100%;height:23px;border: 1px #00FFFF solid;cursor:pointer;border-radius:12px;overflow: hidden;box-shadow:2px 2px 8px #00FFFF;}
            .sewvtop:hover{border:1px #E61AA6 solid;box-shadow:2px 2px 8px #E61AA6;}
            .sewvtop>span{float:left;width:70%;height:23px;white-space:pre;text-overflow:ellipsis;overflow:hidden;font-size: 12px;line-height:22px;color: #666;padding:0 5px;vertical-align: middle;}
            .sewvtop>em{float:right;width: 20px;height: 20px;vertical-align: middle;}
            .sewvbm{width: 100%;position: absolute;left: 0;top: 25px;display:none;border: 1px #D9D9D9 solid;border-radius:2px;background:#ffffff;}
            .sewvbm>li{white-space:pre;text-overflow:ellipsis;overflow:hidden;background: #ffffff;cursor:pointer;width:95%;font-size: 12px;color: #666;padding-left:5px;}
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
                switch ($_GET['catalog']) {
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
                        $catalog="育儿";
                        break;
                    case 8:
                        $catalog="星座";
                        break;
                    case 1:
                    case 9:
                        $catalog="其他";
                        break;
                }

            ?>
            <h1>发表新帖</h1>
            <div class="add">
                <form name="form1" method="post" action="postsave.php">
                    <input type="hidden" id="catalog" name="catalog" value="<?php echo $catalog; ?>">
                    <input type="hidden" name="time" value = "<?php echo date('y-m-d H:i:s',time()); ?> "/>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" style="width:60%;padding:4px;text-align:center;border-radius:15px"/>
                    <br/>
                    <label for="body" style="">Body</label>
                    <textarea id="body" rows="4" name="body" style="width:70%;resize:none;padding:12px;border-radius:35px;overflow:hidden"></textarea>
                    <br/>
                    <label for="catalog">catalog</label>
                    <div class="sewv">
                        <div class="sewvtop"><span><?php echo $catalog; ?></span><em><img src="../images/selebom.png"></em></div>
                        <ul class="sewvbm">
                            <li>其他</li>
                            <li>娱乐</li>
                            <li>文史</li>
                            <li>股票</li>
                            <li>教育</li>
                            <li>体育</li>
                            <li>美食</li>
                            <li>育儿</li>
                            <li>星座</li>
                        </ul>
                    </div>
                    <div class="button" name="submit" onclick="check()">提交</div>
                </form>
            </div>
        </div>
        <div class="back" align="center"><a href="javascript:history.back(-1)">返回</a></div>
        <script type="text/javascript" src="../js/canvas-nest.min.js"></script>
        <script type="text/javascript" src="../js/textinputheight.js"></script>
        <script>
            var text = document.getElementById("body");//text自适应
            autoTextarea(text);                        //
            function check(){
                    var obj1 = document.getElementById("title");
                    var str1 = document.form1.title.value;
                    var obj2 = document.getElementById("body");
                    var str2 = document.form1.body.value;
                    if (str1=="") {
                      alert("标题不能为空!");
                    }
                    else if (str2=="") 
                      alert("内容不能为空!");
                    else {
                      document.form1.submit();
                    }
            }
        </script>
    </body>
</html>
