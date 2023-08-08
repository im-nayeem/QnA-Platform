<?php

use MongoDB\Operation\FindOne;
use MongoDB\Operation\InsertOne;

require_once $_SERVER["DOCUMENT_ROOT"]."/account/auth-config.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/utility.php";

class User{

    private $firstName = null;
    private $lastName = null;
    private $photo = null;
    private $email = null;
    private $userId = null;


    function __construct() {
        try {
            $arguments = func_get_args();
            $numberOfArguments = func_num_args();
            if(method_exists($this, $function = '__construct'.$numberOfArguments)) 
            {
                call_user_func_array(array($this, $function), $arguments);
            }
        } catch (Exception $e) {
            log_error($e);
        }
    }


/* ----------------------- Methods ------------------------------ */

    // retrive user info from DB using user's object id
    private function __construct1($uid)
    {
        try{
            global $db;
            $collections = $db->users;
            $user_info = $collections->findOne([
                '_id' => new MongoDB\BSON\ObjectId($uid)
            ]);

            $this->firstName = $user_info['first_name'];
            $this->lastName = $user_info['last_name'];
            $this->photo = $user_info['photo'];
            $this->email = $user_info['email'];
            $this->userId = $user_info['_id'];
            

        }catch(Exception $e){
            log_error($e);
        }
    }
    // retrieve user information from google account using access token gotten by auth
    private function __construct2($access_token, $google_client)
    {
        try{
            $google_client->setAccessToken($access_token);
            $google_oauth = new Google_Service_Oauth2($google_client);
            $user_info = $google_oauth->userinfo->get();

            $this->firstName = $user_info['givenName'];
            $this->lastName = $user_info['familyName'];
            $this->photo = $user_info['picture'];
            $this->email = $user_info['email'];

            $google_client->revokeToken();

            $this->checkUserInDB();

        }catch(Exception $e){
            log_error($e);
        }
    }

    // check if user info is available in DB, if not(new user) then store user info
    private function checkUserInDB() {
        try {
            global $db;
            $collections = $db->users;
            $userDocument = $collections->FindOne(["email" => $this->email]);
            if($userDocument == null)
            {
                $collections->InsertOne([
                    'first_name' => $this->firstName,
                    'last_name' => $this->lastName,
                    'email' => $this->email,
                    'photo' => $this->photo,
                ]); 
                $userDocument = $collections->FindOne(["email" => $this->email]);
            }
            $this->userId = $userDocument['_id'];
        }
        catch(Exception $e) {
            error_log($e."\n");
        }
    }

/* ----------------- Getters(Public) ---------------- */

    function getFirstName(){
        return $this->firstName;
    }
    function getLastName(){
        return $this->lastName;
    }
    function getPhoto(){
        return $this->photo;
    }
    function getEmail(){
        return $this->email;
    }
    function getUserId(){
        return $this->userId;
    }
}
?>