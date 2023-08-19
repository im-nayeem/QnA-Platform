<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/account/model/user.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/model/question.php";

if(!isset($_SESSION))
    session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST))
{
   try{
    $question = new Question();
    $qid = $question->storeInDatabase();

    $page = "/question-view.php?qid=".$qid;
    header('Location: '.$page);
   } 
   catch(Exception $e){
    log_error($e);
    $errPage = "/error/error.php?error_msg=Error occured while posting question.";
    header('Location: '.$errPage);
   }

}

?>