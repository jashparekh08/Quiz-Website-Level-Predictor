<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

// when exam is not start
if(!isset($_SESSION["end_time"])){
    echo "00:00:00";
}
// when exam start then show countdown timer
else{
    $time1=gmdate("H:i:s", strtotime($_SESSION["end_time"]) - strtotime(date("Y-m-d H:i:s")));
    if(strtotime($_SESSION["end_time"])<strtotime(date("Y-m-d H:i:s")))
    {
        echo "00:00:00";
    }
    else{
        echo $time1;
    }


}

?>