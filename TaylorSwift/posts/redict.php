<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            Posts
        </title>
    </head>
    <body>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . './inc/db.php';
            $title = $_POST['title'];
            $id=-1;
            $query=$dbb->prepare("select * from i_posts");
            $query->execute();
            while ($row = $query->fetch(PDO::FETCH_NUM)) {
                if($row[1]==$title){
                    $id=$row[0];
                    break;
                }
            }
            if($id!=-1){ ?>
                <script>
                    location.href='./show.php?id=<?php echo $id; ?>&catalog=<?php echo $_GET['catalog']; ?>';
                </script>
        <?php } 
            else{ ?>
                <script>
                    alert("输入有误！");
                    location.href='./index.php?catalog=<?php echo $_GET['catalog']; ?>';
                </script>
        <?php } ?>
    </body>
</html>
