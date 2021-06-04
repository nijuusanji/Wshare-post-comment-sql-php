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

    $dayTH = ['sun','mon','tue','wen','thur','fri','sat'];
    $monthTH = [null,'jan','feb','march','april','may','june','july','aug','seb','oct','nov','dec'];
    $monthTH_brev = [null,'jan','feb','march','april','may','june','july','aug','seb','oct','nov','dec'];
    function thai_date_and_time($time){   
        global $dayTH,$monthTH;   
        date_default_timezone_set("Asia/Bangkok");
        $thai_date_return = date("j",$time);   
        $thai_date_return.=" ".$monthTH[date("n",$time)];   
        $thai_date_return.= " ".(date("Y",$time)+543);   
        $thai_date_return.= " time: ".date("H:i:s",$time);
        return $thai_date_return;   
    } 

    if(isset($_POST['comment'])){
        $comment = mysqli_real_escape_string($conn, $_REQUEST['textcomment']);
        $commentown = $_SESSION['username'];
        $topic = $_SESSION['role'];
        $topicown = $_SESSION['own'];
        $dateData = time(); 
        $getTime =  thai_date_and_time($dateData); 

        if(empty($comment)){
            array_push($errors, "Please input something");
            $_SESSION['error'] = "Please input something";
        }

        if(count($errors) == 0){
            $query = "INSERT INTO `insidePost`( `topic`, `topicown`, `comment`, `commentown`, `like`, `date_create`) 
                VALUES ('$topic','$topicown','$comment','$commentown','0', '$getTime')";
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