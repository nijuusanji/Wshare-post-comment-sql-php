<?php 
    session_start();
    require('connect.php');

    $errors = array();

    if(isset($_POST['post'])){
        $post = mysqli_real_escape_string($conn, $_REQUEST['textpost']);
        $username = $_SESSION['username'];
        $comment = 0;


        if(empty($post)){
            array_push($errors, "Please input something");
            $_SESSION['error'] = "Please input something";
        }

        if(count($errors) == 0){
            $query = " INSERT INTO post (topic, username, comment) VALUES ('$post','$username','40')";
            $objQuery = mysqli_query($conn, $query);

            if($objQuery){
                $_SESSION['posted'] = "Huley! You post something!.";
                header('location: index.php');
            }else{
                $_SESSION['posted'] = $post;
                header('location: index.php');
            }
        }else{
            header('location: index.php');
        }
    }
    mysqli_close($conn);
?>