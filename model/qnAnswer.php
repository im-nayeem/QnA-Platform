<?php
require_once $_SERVER['DOCUMENT_ROOT']."/account/model/user.php";
require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";

class Answer{
    private $aid = null;
    private $qid = null;
    private $author = null;
    private $text = null;
    private $timestamp = null;

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
            throw new Exception("Error Processing Request In Answer __construct: ".$e, 0);
        }
    }

    function __construct0()
    {
        $ans = null;
        if(isset($_POST))
            $ans = $_POST;
        else if(isset($_SESSION['POST']))
            $ans = $_SESSION['POST'];
       
        try{
            $this->text = $ans['details'];
            $this->qid = new MongoDB\BSON\ObjectId($ans['qid']);
            $this->author = unserialize($_SESSION["user"]);
            $this->timestamp = getCurrentTime();
        
        } catch(Exception $e){
                throw new Exception("Error Processing Request In Answer __construct0: ".$e, 1);
        }
    }


    function __construct1($ans)
    {
        try{
            $this->aid = $ans['_id'];
            $this->qid = $ans['qid'];
            $this->text = $ans['text'];
            $this->author = new User($ans['uid']);
            $this->timestamp = $ans['time'];
        } catch(Exception $e){
            throw new Exception("Error Processing Request in Answer __construct1: ".$e, 0);
        }
    }




    function storeInDatabase(){
        global $db, $db_client;
        $session = $db_client->startSession();
        try{
            $session->startTransaction();

            $collections = $db->answers;
            $insertedResutlt = $collections->insertOne(
                [
                    'text' => $this->text,
                    'uid' => $this->author->getUserId(),
                    'qid' => $this->qid,
                    'time' => $this->timestamp
                ],
                ['session' => $session]
            );
            
            Question::incrementAnswerCount($this->qid, $session);
            $session->commitTransaction();

            return $insertedResutlt->getInsertedId();

        } catch(Exception $e){
            $session->abortTransaction();
            log_error($e);
        } finally{
            $session->endSession();
        }
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
    function getTimestamp(){
        return $this->timestamp;
    }
    
}

?>