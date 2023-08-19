<?php
require_once $_SERVER['DOCUMENT_ROOT']."/model/question.php";
require_once $_SERVER['DOCUMENT_ROOT']."/db.php";


/**
 * @param $error_message the error messages to log on error.log file
 */
function log_error($error_message){
    error_log($error_message.PHP_EOL.PHP_EOL, 3, $_SERVER['DOCUMENT_ROOT']."/error/error.log");
}


function getCurrentTime(){
    date_default_timezone_set("UTC");
    return  date("Y-m-d H:i");
}

function convertUTCToLocal($time){
    echo "<script>getTime('$time');</script>";
}

?>