<?php 
    session_start();
    require('connect.php');

    if(isset($_GET['role'])){
        $_SESSION['role']=$_GET['role'];
    }
    if(isset($_GET['own'])){
        $_SESSION['own']=$_GET['own'];
    }

    

    $errors = array();

    if(isset($_POST['comment'])){
        $comment = mysqli_real_escape_string($conn, $_REQUEST['textcomment']);
        $commentown = $_SESSION['username'];
        $topic = $_SESSION['role'];
        $topicown = $_SESSION['own'];

        if(empty($comment)){
            array_push($errors, "Please input something");
            $_SESSION['error'] = "Please input something";
        }

        if(count($errors) == 0){
            $query = "INSERT INTO `insidePost`(`topic`, `topicown`, `comment`, `commentown`, `like`) VALUES ('$topic','$topicown','$comment','$commentown','13')";
            $objQuery = mysqli_query($conn, $query);

            if($objQuery){
                $_SESSION['commented'] = "Huley! You comment something!.";
                header('location: comment.php');
            }else{
                $_SESSION['commented'] = "Failed to add comment";
                header('location: comment.php');
            }
        }else{
            $_SESSION['commented'] = "Failed to add comment eiei";
            header('location: comment.php');
        }
    }
    mysqli_close($conn);
?>