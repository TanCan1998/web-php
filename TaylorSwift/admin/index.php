<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>
            登陆页
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <link rel="stylesheet" media="screen" href="../css/cssstyle.css"/>
        <link rel="stylesheet" type="text/css" href="../css/reset.css"/>
        <link rel="stylesheet" href="../css/animate.css">
        <style>
            html{
                font-family:"微软雅黑";
                background:#FFFFFF url(../images/login.png) no-repeat fixed top;
                background-size:100%;
                background-attachment:fixed;
            }
            *{margin: 0px;padding: 0px;}
            .login{
                background-color:rgba(0,205,205,0.2);
            }
            input{
                background:none;
            }
            .button{
                background-color:#58CCC1;
                font-size:15px;
            }
            .button:hover{
                background-color:#20B6B1;
            }
            @media only screen and (max-width: 500px) {
                html{
                    background-size:180%;
                }
            }
        </style>
    </head>
    <body>
        <?php
            session_start();  
            //检测是否登录 
            if(isset($_SESSION['managerid'])){  
                header("location:./manage.php");
            }
        ?>
        <div class="login">
            <div class="login-top" style="color:#20B6B1">
                管理员登录
            </div>
            <form name="form1" method="post" action="Login.php?action=1">
                <input type="hidden" name="submit1"/>
                <div class="login-center clearfix">
                    <div class="login-center-img">
                        <img src="../images/name.png"/>
                    </div>
                    <div class="login-center-input">
                        <input type="text" name="managername" id="managername" value="" placeholder="请输入管理员用户名" onfocus="this.placeholder=''" onblur="this.placeholder='请输入管理员用户名'"/>
                        <div class="login-center-input-text">
                            用户名
                        </div>
                    </div>
                </div>
                <div class="login-center clearfix">
                    <div class="login-center-img">
                        <img src="../images/password.png"/>
                    </div>
                    <div class="login-center-input">
                        <input type="password" name="password" id="password" value="" placeholder="请输入密码" onfocus="this.placeholder=''" onblur="this.placeholder='请输入密码'"/>
                        <div class="login-center-input-text">
                            密码
                        </div>
                    </div>
                </div>
            </form>
            <div class="button" name="submit" onclick="check()">
                登 陆
            </div>
        </div>
        <script>
        function check(){
                var obj = document.getElementById("password");
                var str = document.form1.password.value;
                if (str.replace(/\s/g, "")=="") {
                  alert("密码不能为空");
                }
                else if (str.indexOf(" ") >=0) 
                  alert("输入有空格！");
                else if (obj.value = str.replace(/\s/g, ""),str.length<4||str.length>20) {
                  alert("请输入4-1密码");
                }
                else {
                  document.form1.submit();
                }
        }
        </script>
        <script src="../js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
    </body>
</html>
