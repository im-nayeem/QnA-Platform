<?php

use MongoDB\Operation\FindOne;
use MongoDB\Operation\InsertOne;

require_once $_SERVER["DOCUMENT_ROOT"]."/account/auth-config.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/db.php";

class User{
    private $firstName = null;
    private $lastName = null;
    private $photo = null;
    private $email = null;
    private $user_info = null;
    private $userName = null;

    function __construct($access_token){
        try {
            global $google_client;
            $google_client->setAccessToken($access_token);
            $google_oauth = new Google_Service_Oauth2($google_client);
            $user_info = $google_oauth->userinfo->get();

            $this->firstName = $user_info['givenName'];
            $this->lastName = $user_info['familyName'];
            $this->photo = $user_info['picture'];
            $this->email = $user_info['email'];
            $this->userName = explode('@',$this->email)[0];

            $google_client->revokeToken();

            $this->checkUser();

        } catch (Exception $e) {
            error_log("Error! ".$e."\n");
        }
    }
    private function checkUser(){
        try{
            global $db_client;
            $collections = $db_client->qna->users;
            $document = $collections->FindOne(["email" => $this->email]);
            if($document == null)
            {
                $insertedResult = $collections->InsertOne([
                    'first_name' => $this->firstName,
                    'last_name' => $this->lastName,
                    'email' => $this->email,
                    'photo' => $this->photo,
                    'username' => $this->userName
                ]); 
                echo "<script> alert(".$insertedResult->getInsertedId().");</script>";
            }
        }
        catch(Exception $e){
            error_log($e."\n");
        }
    }

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
    function getUserInfo(){
        return $this->user_info;
    }
    function getUserName(){
        return $this->userName;
    }
}
?>