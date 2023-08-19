<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/account/model/user.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/utility.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/filter/login-filter.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/model/qnAnswer.php";

if(!isset($_SESSION))
    session_start();

if(($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST)) or isset($_SESSION['POST']))
{
   try{
    $answer = new Answer();
    $aid = $answer->storeInDatabase();
    $page =  "/question-view?qid=".$answer->getQid()."#".$aid;
    header('Location: '.$page);
   } 
   catch(Exception $e){
    log_error($e);
    $errPage = $_SERVER['DOCUMENT_ROOT']."/error/error.php?error_msg=Error occured while posting answer.";
    header('Location: '.$errPage);
   }
}


?>