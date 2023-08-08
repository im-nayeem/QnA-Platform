<?php
require_once $_SERVER['DOCUMENT_ROOT']."/account/user.php";
require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";

class Answer{
    private $aid = null;
    private $qid = null;
    private $author = null;
    private $text = null;

    function __construct($answer)
    {
        $this->aid = $answer['_id'];
        $this->qid = $answer['qid'];
        $this->text = $answer['text'];
        $this->author = new User($answer['uid']);

    }

    function getQid(){
        return $this->qid;
    }
    function getAuthor(){
        return $this->author;
    }
    function getText(){
        return $this->text;
    }
    function getAid(){
        return $this->aid;
    }
    
}

?>