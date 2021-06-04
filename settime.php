<?php 
$dayTH = ['sun','mon','tue','wen','thur','fri','sat'];
$monthTH = [null,'jan','feb','march','april','may','june','july','aug','seb','oct','nov','dec'];
$monthTH_brev = [null,'jan','feb','march','april','may','june','july','aug','seb','oct','nov','dec'];
function thai_date_and_time($time){   
    global $dayTH,$monthTH;   
    $thai_date_return = date("j",$time);   
    $thai_date_return.=" ".$monthTH[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
    $thai_date_return.= " time: ".date("H:i:s",$time);
    return $thai_date_return;   
} 
?>

