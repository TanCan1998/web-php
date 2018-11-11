<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            帖子列表
        </title>
        <style type="text/css">
        	    html{
                 	font-family:"微软雅黑";
                }
        		body {
                    min-height: 95vh;
        		    background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        		    background-color:#20CECE;
                    background-attachment:fixed;
        		}
        		table,th,td{
                    border:0;
                    border-radius:15px;
                    text-align:center;
                }
                th{
                    box-shadow:1px 1px 1px 1px #545454;
                    padding:6px;
                    background-color:#99AA55;
                }
                td{
                    padding:6px;
                    background-color:#BDE61A;
                    width:200px;
                }
                a{
                    color:#000000;
                    padding:7px;
                    border-radius:15px;
                    text-decoration:none;
        		}
                a:hover,a:active{
                    background-color:#99AA55;
                }
                .button{
                    margin:30px;
                    padding:10px;
                    width:170px;
                    border-radius:20px;
                    background-color:#BDE61A;
                    box-shadow:0px 0px 2px 2px #7A7A7A;
                }
                .button:hover,.button:active{
                    background-color:#99AA55;
                }
        	</style>
    </head>
    <body>
        <div class="" align="center">
            <h1>
                LIST
            </h1>
            <table>
                <thead>
                    <tr>
                        <th>标题</th>
                        <th>类别</th>
                        <th>创建日期</th>
                        <th>操作</th>
                    </tr>
                <tbody>
                <?php  session_start();   //检测是否登录，若没登录则转向登录界面  
                 if(!isset($_SESSION['userid'])){   
                    header("Location:Login.html");  
                    exit();  
                }  
                require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php'; 
                $result = mysqli_query($db, "select * from i_posts"); 
                while ($row = mysqli_fetch_row($result)) { ?>
                    <tr>
                        <td>
                            <?php 
                                if(strlen($row[1])>11) 
                                    echo mb_substr($row[1],0,11)."...";
                                else echo $row[1];
                            ?>
                        </td>
                        <td style="width:100px"><?php 
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
                        ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td style="width:100px">
                          <a href="editposts.php?id=<?php echo $row[0];?>">改</a>
                          <a href="javascript:;" onclick="delete1(<?php echo $row[0];?>)">删</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <div class="button" onclick="home()">返回</div>
        </div>
        <script>
            function home(){
                location.href="./admin.php";
            }
            function delete1(aa){
                var str=aa;
                if(confirm("确认删除此帖？\n此操作将会删除此贴相关的评论哦ヾ(ｏ･ω･)ﾉ")){ 
                    location.href="deleteposts.php?id="+aa;
                }
            }
        </script>
    </body>
</html>
