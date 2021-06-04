<?php 
    session_start();
    require("connect.php");

    if(isset($_GET['role'])){
        $_SESSION['role']=$_GET['role'];
    }
    if(isset($_GET['own'])){
        $_SESSION['own']=$_GET['own'];
    }
    
    $topic = $_SESSION['role'];
    $topicown = $_SESSION['own'];

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Comment</title>
</head>
<body>
    <a class="fixed-top text-white rounded p-4" href="index.php">
        <button class="btn btn-dark">Back</button>
    </a>
    <div class="container d-flex-column pt-5">
        <div class="p-4 bg-info rounded">
            <div class="commentheader p-3">
                <h3 class="head-topic"><?php echo $topic; ?></h3>
                <p class="head-topic"><?php echo $topicown; ?></p>
            </div>
        </div>
        <form action="comment_db.php" method="post" class="pt-3">
            <?php include('errors.php'); ?>
            <?php if (isset($_SESSION['commented'])) : ?>
                    <div class="commented">
                        <h3>
                            <?php 
                                echo $_SESSION['commented'];
                                unset($_SESSION['commented']);
                            ?>
                        </h3>
                    </div>
            <?php endif ?>
            <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
            <?php endif ?>
            <div class="input-group mb-3"> 
                <input class="form-control" placeholder="Add comment here.." name="textcomment"></input>
                <div class="input-group-append">
                    <button type="submit" name="comment" class="btn btn-primary">comment</button>
                </div>
            </div>
        </form>
        <?php
            $sql = "SELECT `id`, `topic`, `topicown`, `comment`, `commentown`, `like`, `date_create` FROM `insidePost` WHERE topic='$topic' AND topicown='$topicown' ORDER BY id DESC";   
            $objQuery = mysqli_query($conn, $sql);
            
        ?>

        <div name="commentContainer" class="commentContainer">
            <?php while($objResult = mysqli_fetch_array($objQuery)) { ?>
            <div class="p-3">
                <div class="thiscomment border border-secondary p-3 rounded">
                    <h4 name="comment" class="comment text-info"><?php echo $objResult["comment"]; ?></h4>
                    <div class="d-flex justify-content-between pt-3 text-muted">
                        <p>commented by <?php echo $objResult["commentown"]; ?></p>
                        <p><?php echo $objResult["date_create"]; ?></p>
                    </div>
                </div>   
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>