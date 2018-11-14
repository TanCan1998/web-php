<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            添加评论
        </title>
    </head>
    <body>
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
            $id = $_POST['post_id'];
            $title = htmlentities($_POST['title']);
            $body  = htmlentities($_POST['body']);
            $time = $_POST['time'];
            $query=$dbb->prepare("INSERT INTO i_comments (post_id,title, body, created_at)VALUES(:post_id,:title,:body,:time)");
            $query->bindValue(':title',$title,PDO::PARAM_STR);
            $query->bindValue(':body',$body,PDO::PARAM_STR);
            $query->bindValue(':time',$time,PDO::PARAM_STR);
            $query->bindValue(':post_id',$id,PDO::PARAM_INT);
            if (!$query->execute()) {
                echo "错误!";
                echo ' <br/> ';
            } else {
        ?>
                <script language='JavaScript'>
                    alert('添加评论成功！\n点击确定跳转到刚刚发表的评论哦');
                    location.href='./showposts.php?id=<?php echo $id; ?>&catalog=<?php echo $_GET['catalog']; ?>#add';
                </script>
        <?php } ?>
    </body>
</html>
