<!DOCTYPE html>
  <!--Safety pig has arrived!
  ##                               _
  ##  _._ _..._ .-',     _.._(`))
  ## '-. `     '  /-._.-'    ',/
  ##    )         \            '.
  ##   / _    _    |             \
  ##  |  a    a    /              |
  ##  \   .-.     /               ;
  ##   '-('' ).-'       ,'       ;
  ##      '-;           |      .'
  ##         \           \    /
  ##         | 7  .__  _.-\   \
  ##         | |  |  ``/  /`  /
  ##        /,_|  |   /,_/   /
  ##           /,_/      '`-'
  -->
 <?php
session_start();
if (!isset($_SESSION['visitor'])) {
    $_SESSION['visitor'] = time() . "" . rand(0, 9);
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Home—iSwiftie</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/jPicture.min.js"></script>
    <style type="text/css">
        *{margin:0;padding:0;}
        #wrapper1{
            margin:0 auto;
            border-radius:30px 30px 30px 30px;
        }
        #wrapper2{
            margin:0 auto;
            border-radius:30px 30px 30px 30px;
        }
        html, * {
          margin: 0;
          padding: 0;
        }
        html {
            height:2100px;
        }
        body {
          height: 100%;
          min-height: 100%;
          background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%);
        }
        ::selection {
            background:#F44380;
        }
        ::-moz-selection {
            background:#F44380;
        }
        ::-webkit-selection {
            background:#F44380;
        }
        .header-navigation {
          position: fixed;
          top: 0;
          width: 100%;
          height: 60px;
          line-height: 60px;
          background-color: #333333;
          text-align: center;
          box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
          z-index: 9999;
        }
        .link {
          color: #ffffff;
          text-decoration: none;
          margin: 0 30px;
        }
        h1 {
          text-align: center;
          margin-top: 50px;
          margin-bottom:50px;
          color: #ffffff;
        }
        /* Slide transitions */
        .slideUp {
         /* -webkit-transform: translateY(-100px);
          transform: translateY(-100px);*/
          -webkit-transform: translateY(-100px);
          -ms-transform: translateY(-100px);
          -o-transform: translateY(-100px);
          transform: translateY(-100px);
          /*transition: transform .5s ease-out;*/
          -webkit-transition: transform .5s ease-out;
          -o-transition: transform .5s ease-out;
          transition: transform .5s ease-out;
        }
        .slideDown {
          /*-webkit-transform: translateY(0);
          transform: translateY(0);*/
          -webkit-transform: translateY(0);
          -ms-transform: translateY(0);
          -o-transform: translateY(0);
          transform: translateY(0);
          /*transition: transform .5s ease-out;*/
          -webkit-transition: transform .5s ease-out;
          -o-transition: transform .5s ease-out;
          transition: transform .5s ease-out;
        }
        .box1 img {
            width: 120px;
            border-radius:65px;
            margin: 10px;
        }
        .iframe_page{
            margin: 0 auto;
            width: 800px;
            height: 520px;
        }
        .iframe_page #framePage{
            width: 800px;
            height: 520px;
            /*background-color: #606058;*/
            border: 3px dashed #606058;
            box-shadow:0px 0px 36px 6px #606058;
        }
        @media only screen and (max-width: 500px) {
            html{
                height:50%;
                width:50%;
            }
            .iframe_page{
                width:700px;
            }
            .iframe_page #framePage{
                width:700px;
            }
            *{
                font-size:19px;
            }
            h1{
                font-size:29px;
            }
        }
    </style>
</head>
<body>
    <header class="header-navigation" id="header">
      <nav>
       <!-- <a class="link" href="#" title="Black history">霉的“黑历史”</a> -->
       <a class="link" href="javascript:;" title="News" onclick="window.open('./news/','news');">霉闻趣事</a>
       <a class="link" href="javascript:;" title="Pictures" onclick="window.open('./pictures/','pictures');">美霉图</a>
       <a class="link" href="javascript:;" title="Mall" onclick="window.open('https://www.taylorswift.com','Mall');">官方商城</a>
       <a class="link" href="javascript:;" title="Posts" onclick="window.open('./posts/','posts');">交流论坛</a>
      </nav>
    </header>
    <div class="htmleaf-container">
        <div class="htmleaf-header">
            <h1>TAYLOR SWIFT <span>Come morning light.You and I'll be safe and sound.</span></h1>
            <div class="htmleaf-links">
                <a class="htmleaf-icon icon-htmleaf-home-outline" href="#wrapper<?php echo rand(1, 2); ?>" title="Home"><span> Home</span></a>
                <a class="htmleaf-icon icon-htmleaf-arrow-forward-outline" href="./admin/" title="Management" target="_blank"><span> Login</span></a>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            var ua = navigator.userAgent;
            var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
            isIphone =!ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
            isAndroid = ua.match(/(Android)\s+([\d.]+)/),
            isMobile = isIphone || isAndroid;
            //判断
            if(isMobile){
                $("#wrapper1").jPicture([
                    { src: "./images/1.jpg"},
                    { src: "./images/2.jpg"},
                    { src: "./images/3.jpg"},
                    { src: "./images/4.jpg"},
                    { src: "./images/9.gif"}
                ], {
                    effect: "slide",   // 可选, 图片切换方式, slide(默认左右滑动), fade(淡入淡出), show(直接显示)
                    dotAlign: "center", // 可选, 下方切换按钮的对齐方式, center(默认居中), left(居左), right(居右)
                    dotShape: "line",  // 可选, 下方切换按钮的形状, circle(默认圆点), square(方框), line(线形)
                    autoplay: 4000,    // 可选, 自动切换时间间隔, 单位：ms, 默认: 5000, 设置为 false 则不进行自动切换
                    duration: 1200,    // 可选, 切换动画的过渡时间, 单位：ms, 默认：750, 只对 slide 和 fade 生效
                    width: 700,
                    height: 430
                });
            }else{
                $("#wrapper1").jPicture([
                    { src: "./images/1.jpg"},
                    { src: "./images/2.jpg"},
                    { src: "./images/3.jpg"},
                    { src: "./images/4.jpg"},
                    { src: "./images/9.gif"}
                ], {
                    effect: "slide",   // 可选, 图片切换方式, slide(默认左右滑动), fade(淡入淡出), show(直接显示)
                    dotAlign: "center", // 可选, 下方切换按钮的对齐方式, center(默认居中), left(居左), right(居右)
                    dotShape: "line",  // 可选, 下方切换按钮的形状, circle(默认圆点), square(方框), line(线形)
                    autoplay: 4000,    // 可选, 自动切换时间间隔, 单位：ms, 默认: 5000, 设置为 false 则不进行自动切换
                    useTransform: true,// 可选, 针对 slide 切换方式, 是否使用 transform 形式, 默认：false
                    duration: 1200,    // 可选, 切换动画的过渡时间, 单位：ms, 默认：750, 只对 slide 和 fade 生效
                    width: 800,
                    height: 450
                });
            }
        })
    </script>
    <div id="wrapper1"></div>
    <div class="box1" align="center"><img src="./images/2.gif"><a href="https://dwz.cn/j5xNRYXX" target="blank"><img src="./images/3.gif" title="快来看看1989巡演(〃'▽'〃)"></a><img src="./images/2.gif"></div>
    <script>
        $(function () {
            var ua = navigator.userAgent;
            var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
            isIphone =!ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
            isAndroid = ua.match(/(Android)\s+([\d.]+)/),
            isMobile = isIphone || isAndroid;
            //判断
            if(isMobile){
                $("#wrapper2").jPicture([
                    { src: "./images/5.jpg"},
                    { src: "./images/6.jpg"},
                    { src: "./images/7.jpg"},
                    { src: "./images/8.jpg"},
                    { src: "./images/5.gif"}
                ], {
                    effect: "fade",   // 可选, 图片切换方式, slide(默认左右滑动), fade(淡入淡出), show(直接显示)
                    dotAlign: "center", // 可选, 下方切换按钮的对齐方式, center(默认居中), left(居左), right(居右)
                    dotShape: "line",  // 可选, 下方切换按钮的形状, circle(默认圆点), square(方框), line(线形)
                    autoplay: 4000,    // 可选, 自动切换时间间隔, 单位：ms, 默认: 5000, 设置为 false 则不进行自动切换
                    duration: 1200,    // 可选, 切换动画的过渡时间, 单位：ms, 默认：750, 只对 slide 和 fade 生效
                    width: 700,
                    height: 450
                });
            }else{
                $("#wrapper2").jPicture([
                    { src: "./images/5.jpg"},
                    { src: "./images/6.jpg"},
                    { src: "./images/7.jpg"},
                    { src: "./images/8.jpg"},
                    { src: "./images/5.gif"}
                ], {
                    effect: "fade",   // 可选, 图片切换方式, slide(默认左右滑动), fade(淡入淡出), show(直接显示)
                    dotAlign: "center", // 可选, 下方切换按钮的对齐方式, center(默认居中), left(居左), right(居右)
                    dotShape: "line",  // 可选, 下方切换按钮的形状, circle(默认圆点), square(方框), line(线形)
                    autoplay: 4000,    // 可选, 自动切换时间间隔, 单位：ms, 默认: 5000, 设置为 false 则不进行自动切换
                    duration: 1200,    // 可选, 切换动画的过渡时间, 单位：ms, 默认：750, 只对 slide 和 fade 生效
                    width: 800,
                    height: 500
                });
            }
        })
    </script>
    <div id="wrapper2"></div>
    <script type="text/javascript">
        var new_scroll_position = 0;
        var last_scroll_position;
        var header = document.getElementById("header");
        window.addEventListener('scroll', function(e) {
            last_scroll_position = window.scrollY;
            // Scrolling down
            if (new_scroll_position < last_scroll_position && last_scroll_position > 80) {
                // header.removeClass('slideDown').addClass('slideUp');
                header.classList.remove("slideDown");
                header.classList.add("slideUp");
                // Scrolling up
            } else if (new_scroll_position > last_scroll_position) {
                // header.removeClass('slideUp').addClass('slideDown');
                header.classList.remove("slideUp");
                header.classList.add("slideDown");
            }
            new_scroll_position = last_scroll_position;
        });
        window.name="swift";
    </script>
    <script>
        var ua = navigator.userAgent;
        var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
        isIphone =!ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
        isAndroid = ua.match(/(Android)\s+([\d.]+)/),
        isMobile = isIphone || isAndroid;
        //判断
        if(isMobile){
            $("#wrapper1").css.("width","80%");
            $("#wrapper2").css.("width","80%");
        }
    </script>
    <div class="box1" align="center"><img src="./images/4.gif"><a href="https://dwz.cn/li61cS4J" target="blank"><img src="./images/3.gif" title="最鲜Reputation巡演"></a><img src="./images/4.gif"></div>
    <div class="iframe_page">
    <iframe id="framePage" src="https://player.bilibili.com/player.html?aid=16276586&cid=26559512&page=6" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"></iframe>
    </div>
    <div class="htmleaf-footer" style="width:100%;text-align:center;margin-top:65px;">
        &copy这是TaylorTan制作的个人网站，内容主要是关于霉霉的一些东西，前端技术大部分来自互联网，希望对大家有所帮助。
    </div>
</body>
</html>