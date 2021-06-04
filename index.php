<?php 
    session_start();
    
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wshare feed page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top text-white justify-content-between">
        <h2>Wshare</h2>
        <?php if (isset($_SESSION['username'])) : ?>
            <h3 class="text-info"><?php echo $_SESSION['username']; ?></h3>
            <a href="index.php?logout='1'" class="btn btn-danger">Sign out</a>
        <?php endif ?>
    </nav>
    
    <div class="container d-flex-column pt-5">
        <!-- <?php //if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        //echo $_SESSION['success'];
                        //unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php //endif ?> -->
        
        <form action="feed_db.php" method="post" class="pt-5">
            <?php include('errors.php'); ?>
            <?php if (isset($_SESSION['posted'])) : ?>
                <div class="posted">
                    <h3>
                        <?php 
                            echo $_SESSION['posted'];
                            unset($_SESSION['posted']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="error text-danger">
                    <p>
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    <p>
                </div>
            <?php endif ?>
            <div class="input-group mb-3">  
                <input placeholder="post something..." name="textpost" class="form-control"></input>
                <div class="input-group-append">
                    <button type="submit" name="post" class="btn btn-primary">Post</button>
                </div>
            </div>
        </form>

        
        <?php
            require('connect.php');
            $sql = 'SELECT `id`,`topic`, `username`, `date_create` FROM post ORDER BY id DESC';
            $objQuery = mysqli_query($conn, $sql);
            
        ?>
        <div name="postContainer d-flex pt-3">
            <?php while($objResult = mysqli_fetch_array($objQuery)) { ?>
            <a class="p-5 text-decoration-none" href="comment.php?role=<?php echo $objResult["topic"]?>&own=<?php echo $objResult["username"]?>">
                <div class="thispost border border-secondary p-3 rounded">
                    <h4 class="text-info" name="topicPost" class="topicPost"><?php echo $objResult["topic"]; ?></h4>
                    <div class="d-flex justify-content-between pt-3 text-muted">
                        <p>posted by <?php echo $objResult["username"]; ?></p>
                        <p><?php echo $objResult["date_create"];?></p>
                    </div>
                    
                </div>   
            </a>  
            <?php
            }?>
        </div>

    </div>

</body>
</html>