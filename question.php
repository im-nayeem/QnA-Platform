<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/account/user.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";

class Question{
    private $title = null;
    private $details = null;
    private $author = null;

    function __construct($qid)
    {
        try{
            global $db;
            $collections = $db->questions;
            $qn = $collections->findOne([
                '_id' => new MongoDB\BSON\ObjectId($qid)
            ]);
            if($qn == null)
                throw new Exception("Error Processing Request", 1);
            
            $this->title = $qn['title'];
            $this->details = $qn['details'];
            $this->author = new User($qn['uid']);
            
        }catch(Exception $e){
            log_error($e);
            header("Location: "."/error/error404.php");
            exit;
        }
        
    }

    function getTitle(){
        return $this->title;
    }
    function getDetails(){
        return $this->details;
    }
    function getAuthor(){
        return $this->author;
    }

}

?>