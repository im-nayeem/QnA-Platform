<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__."/config.php";

use MongoDB\Client;
use MongoDB\Collection;
use MongoDB\Driver\ServerApi;

$uri = $db_url;

// Specify Stable API version 1
$apiVersion = new ServerApi(ServerApi::V1);

// Create a new client and connect to the server
$db_client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);

// try {
//     // Send a ping to confirm a successful connection
//     $db_client->qna->command(['ping' => 1]);
//     echo "Pinged your deployment. You successfully connected to MongoDB !\n";

// } catch (Exception $e) {
//     printf($e->getMessage());
// }

                // $collections = $db_client->qna->users;
                // $document = $collections->FindOne(['email' => 'nayeem.cse.cou@gmail.com']);
                // if($document == null)
                // {
                //     $insertedResult = $collections->InsertOne([
                //         'first_name' => 'Nayee',
                //         'last_name' => 'Hossain',
                //         'email' => 'nayeem.cse.cou@gmail.com',
                //         // 'photo' => '',
                //         'username' => 'nayeem02'
                //     ]); 
                //     echo "<script> alert(".$insertedResult->getInsertedId().");</script>";
                // }


?>