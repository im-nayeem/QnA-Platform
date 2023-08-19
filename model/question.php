<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/account/model/user.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/utility.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/model/qnAnswer.php";


class Question{

    private $qid = null;
    private $title = null;
    private $details = null;
    private $author = null;
    private $timestamp = null;
    private $answerCount = null;
    private $answerList = [];


    function __construct()
    {
        try {
            $arguments = func_get_args();
            $numberOfArguments = func_num_args();
            if(method_exists($this, $function = '__construct'.$numberOfArguments)) 
            {
                call_user_func_array(array($this, $function), $arguments);
            }
        } catch (Exception $e) {
            throw new Exception("Error Processing Request In Question __construct: ".$e, 0);
        }
        
        
    }

    // construct a new question from $_POST 
    function __construct0()
    {
        try{

            $this->title = $_POST['title'];
            $this->details = $_POST['details'];
            $this->author = unserialize($_SESSION["user"]);
            $this->timestamp = getCurrentTime();
            $this->answerCount = 0;

        }catch(Exception $e){
            throw new Exception("Error Processing Request In Question __construct0: ".$e, 0);
        }
        
    }


    // retrieve question from database using question id
    function __construct1($qid)
    {
        try{
            global $db;
            $collections = $db->questions;
            $qn = $collections->findOne([
                '_id' => new MongoDB\BSON\ObjectId($qid)
            ]);
            if($qn == null)
                throw new Exception("Question Is Not Found!", 0);
            
            $this->qid = $qn['_id'];
            $this->title = $qn['title'];
            $this->details = $qn['details'];
            $this->timestamp = $qn['time'];
            $this->answerCount = $qn['answer_count'];
            $this->author = new User($qn['uid']);

            $this->retrieveAnswerList($this->qid);
            
        }catch(Exception $e){
            throw new Exception("Error Processing Request In Question __construct1: ".$e, 0);
        }
    }



/* -------------------- Methods ---------------------- */

    function storeInDatabase(){
        global $db;
        try{
            $collections = $db->questions;
            $insertedResutlt = $collections->insertOne([
                'title' => $this->title,
                'details' => $this->details,
                'time' => $this->timestamp,
                'uid' => $this->author->getUserId(),
                'answer_count' => $this->answerCount
            ]);
           
           return $insertedResutlt->getInsertedId();
        }
        catch(Exception $e){
            throw new Exception("Failed To Store Answer In Database: ".$e, 1);
        }
    }


    /**
     * static method to increment answer_count of a question
     * @param $qid the question id of the question
     * @param $session the session from inserting an answer to manage transaction
     */
    public static function incrementAnswerCount($qid, $session){
        global $db;
       
        try{
            $questionsCollection = $db->questions;
            $questionsCollection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectID($qid)],
                ['$inc' => ['answer_count' => 1]],
                ['session' => $session]
            );
        }
        catch(Exception $e){
            throw new Exception("Failed To Increment Answer Count: ".$e, 1);
        }
    }


    // method to retrive all answers to this question
    private function retrieveAnswerList($qid){
        global $db;
        try{
            $collections = $db->answers;
            $list = $collections->find([
                'qid' => new MongoDB\BSON\ObjectId($qid)
            ]);
            foreach($list as $ans)
            {
                array_push($this->answerList, new Answer($ans));
            }
        } catch(Exception $e){
            throw new Exception("Failed To Retrieve Answer List: ".$e, 1);
        }
    }


/* ---------- Getters(public) ----------------- */
    
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
    function getTimestamp(){
        return $this->timestamp;
    }
    function getAnswerCount(){
        return $this->answerCount;
    }
    function getAnswerList(){
        return $this->answerList;
    }

}

?>