<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            帖子列表
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <style type="text/css">
        	    html{
                 	font-family:"微软雅黑";
                }
        		body {
                    min-height: 95vh;
        		    background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
        		    background-color:#E9E4CD;
                    background-attachment:fixed;
        		}
        		table,th,td{
                    border:0;
                    border-radius:15px;
                    text-align:center;
                }
                th{
                    color:#E9E4CD;
                    box-shadow:1px 1px 1px 1px #5E5E5E;
                    padding:6px;
                    background-color:#99AA55;
                }
                td{
                    text-overflow:ellipsis;
                    overflow:hidden;
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
                    cursor:pointer;
                    transition:0.2s ease;
                    color:#000000;
                    margin:30px;
                    padding:10px;
                    width:170px;
                    border-radius:20px;
                    background-color:#BDE61A;
                    box-shadow:2px 2px 2px 2px #7A7A7A;
                }
                .button:hover,.button:active{
                    color:#E9E4CD;
                    background-color:#99AA55;
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
                <?php  
                session_start();
                //检测是否登录  
                if(!isset($_SESSION['managerid'])){   
                    exit('非法访问!');  
                }  
                require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php'; 
                $query=$dbb->prepare("select * from i_posts order by id");
                $query->execute(); 
                while ($posts = $query->fetchObject()) { ?>
                    <tr>
                        <td>
                            <?php 
                                if(strlen($posts->title)>11) 
                                    echo mb_substr($posts->title,0,11)."...";
                                else echo $posts->title;
                            ?>
                        </td>
                        <td style="width:100px"><?php 
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
                        ?></td>
                        <td><?php echo $posts->created_at; ?></td>
                        <td style="width:100px">
                          <a href="edit.php?id=<?php echo $posts->id;?>">改</a>
                          <a href="javascript:;" onclick="delete1(<?php echo $posts->id;?>)">删</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <div class="button" onclick="home()">返回</div>
        </div>
        <script>
            function home(){
                location.href="../manage.php";
            }
            function delete1(aa){
                var str=aa;
                if(confirm("确认删除此帖？\n此操作将会删除此贴相关的评论和图片哦ヾ(ｏ･ω･)ﾉ")){ 
                    location.href="delete.php?id="+aa;
                }
            }
        </script>
    </body>
</html>
