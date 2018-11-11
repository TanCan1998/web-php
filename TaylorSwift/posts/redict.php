<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            Posts
        </title>
    </head>
    <body>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '../inc/db.php';
            $title = $_POST['title'];
            $id=-1;
            $result = mysqli_query($db, "select * from i_posts");
            while ($row = mysqli_fetch_row($result)) {
                if($row[1]==$title){
                    $id=$row[0];
                    break;
                }
            }
            if($id!=-1){ ?>
                <script>
                    location.href='./showposts.php?id=<?php echo $id; ?>';
                </script>
        <?php } 
            else{ ?>
                <script>
                    alert("输入有误！");
                    location.href='./posts.php';
                </script>
        <?php } ?>
    </body>
</html>
