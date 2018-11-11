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
            $sql   = "INSERT INTO i_comments (post_id, title, body, created_at)VALUES('$id','$title','$body','$time')";
            if (!mysqli_query($db, $sql)) {
                echo mysqli_error($db);
                echo ' <br/> ' . $sql;
            } else {
        ?>
                <script language='JavaScript'>
                    alert('添加评论成功！\n点击确定跳转到刚刚发表的评论哦');
                    location.href='./showposts.php?id=<?php echo $id; ?>#add';
                </script>
        <?php } ?>
    </body>
</html>
