<?php 
    session_start();
    require('connect.php');

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

    if(isset($_POST['post'])){
        $post = mysqli_real_escape_string($conn, $_REQUEST['textpost']);
        $username = $_SESSION['username'];
        $comment = 0;
        $dateData = time(); 
        $getTime =  thai_date_and_time($dateData); 

        if(empty($post)){
            array_push($errors, "Please input something");
            $_SESSION['error'] = "Please input something";
        }

        if(count($errors) == 0){
            $query = " INSERT INTO post (topic, username, comment, date_create) VALUES ('$post','$username','0','$getTime')";
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