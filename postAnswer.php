<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/account/user.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/utility.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/filter/login-filter.php";
// require_once $_SERVER["DOCUMENT_ROOT"]."/question.php";

if(!isset($_SESSION))
    session_start();


function storeAnswerInDB($answer)
{
    $details = $answer['details'];
    $qid = new MongoDB\BSON\ObjectId($answer['qid']);
    $user = unserialize($_SESSION["user"]);

    try{
        global $db;
        $collections = $db->answers;
        $insertedResutlt = $collections->insertOne([
            'text' => $details,
            'uid' => $user->getUserId(),
            'qid' => $qid
        ]);
        // "#".$insertedResutlt->getInsertedId()
        $page = "question-view.php?qid=".$qid;
        header("Location: ".$page);
        exit;
    }
    catch(Exception $e){
       log_error($e);
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST))
{
    storeAnswerInDB($_POST);
}
elseif(isset($_SESSION['POST']))
{
   storeAnswerInDB($_SESSION['POST']);
}

?>