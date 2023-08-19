<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/account/model/user.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/utility.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/model/qnAnswer.php";

if(!isset($_SESSION))
    session_start();

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
    private function __construct0()
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
    private function __construct1($qid)
    {
        global $db;
        try{
            $collections = $db->questions;
            $qnInfo = $collections->findOne([
                '_id' => new MongoDB\BSON\ObjectId($qid)
            ]);
            
            if($qnInfo == null)
                throw new Exception("Question Is Not Found!", 0);
            
            $this->organizeData($qnInfo);
            $this->retrieveAnswerList($this->qid);
        
        } catch(Exception $e){
            throw new Exception("Error Processing Request In Question __construct1: ".$e, 0);
        }
    }
    /**
     * @param $qnInfo the array containing question info
     * @param $arg takes any value(recommendation: pass null), used to separate constructor
     */
    private function __construct2($qnInfo, $arg)
    {
        try{
            $this->organizeData($qnInfo);
        }catch(Exception $e){
            throw new Exception("Error Processing Request In Question __construct2: ".$e, 0);
        }
    }

    /**
     * Method to organize data in object
     * @param $qnInfo the array containing question info
     */
    private function organizeData($qnInfo)
    {
        try{
            $this->qid = $qnInfo['_id'];
            $this->title = $qnInfo['title'];
            $this->details = $qnInfo['details'];
            $this->timestamp = $qnInfo['time'];
            $this->answerCount = $qnInfo['answer_count'];
            $this->author = new User($qnInfo['uid']);
        }
        catch(Exception $e){
            throw new Exception("Error In organizeData() In Question: ".$e, 0);
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

    public static function getTopAnsweredQuestions(){
        try{
            global $db;
            $collections = $db->questions->find([],[
                'sort' => ['answer_count' => -1], 
                'limit' => 50
            ]);
            $questionList = [];
    
            foreach($collections as $qn)
                array_push($questionList, new Question($qn, null));
            return $questionList;
    
        }catch(Exception $e){
            throw new Exception("getTopAnsweredQuestion(): ".$e, 0);
        }
    }
    public static function getNotAnsweredQuestions(){
        try{
            global $db;
            $collections = $db->questions->find(['answer_count' => 0]);
            $questionList = [];
    
            foreach($collections as $qn)
                array_push($questionList, new Question($qn, null));
            return $questionList;
    
        }catch(Exception $e){
            throw new Exception("getTopAnsweredQuestion(): ".$e, 1);
        }
    }

    public static function getAllQuestionList(){
        try{
            global $db;
            $collections = $db->questions->find();
            $questionList = [];
    
            foreach($collections as $qnInfo)
            {
                array_push($questionList, new Question($qnInfo, null));
            }
            return $questionList;
    
        }catch(Exception $e){
            log_error($e);
            exit;
        }
    }
    
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