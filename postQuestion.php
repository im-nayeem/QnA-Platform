<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/account/user.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";

if(!isset($_SESSION))
    session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST))
{
    $title = $_POST['title'];
    $details = $_POST['details'];
    $user = unserialize($_SESSION["user"]);
    try{
        $collections = $db_client->qna->questions;

        $insertedResutlt = $collections->insertOne([
            'title' => $title,
            'details' => $details,
            'uid' => $user->getUserId()
        ]);
        $page = "/question-view.php?id=".$insertedResutlt->getInsertedId();
        header("Location: ".$page);
    }
    catch(Exception $e){
        error_log($e."\n");
    }

}
?>