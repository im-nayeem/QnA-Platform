<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/account/user.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/utility.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/qnAnswer.php";


class Question{
    private $qid = null;
    private $title = null;
    private $details = null;
    private $author = null;
    private $answerList = [];

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
            
            $this->qid = $qn['_id'];
            $this->title = $qn['title'];
            $this->details = $qn['details'];
            $this->author = new User($qn['uid']);

            $this->retrieveAnswerList($this->qid);
            
        }catch(Exception $e){
            log_error($e);
            header("Location: "."/error/error404.php");
            exit;
        }
        
    }

/* ------------- Methods ------------------- */
    private function retrieveAnswerList($qid){
        global $db;
        $collections = $db->answers;
        $list = $collections->find([
            'qid' => new MongoDB\BSON\ObjectId($qid)
        ]);
        foreach($list as $ans)
        {
            array_push($this->answerList, new Answer($ans));
        }
        // foreach($this->answerList as $temp)
        //     log_error($temp->getText());
    }

    /* ------- Getters(public) -----------------*/
    
    function getTitle(){
        return $this->title;
    }
    function getDetails(){
        return $this->details;
    }
    function getQid(){
        return $this->qid;
    }
    function getAuthor(){
        return $this->author;
    }
    function getAnswerList(){
        return $this->answerList;
    }

}

?>