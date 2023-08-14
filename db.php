<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__."/config.php";

require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";

use MongoDB\Client;
use MongoDB\Driver\ServerApi;


try {
    $uri = $db_url;

    // Specify Stable API version 1
    $apiVersion = new ServerApi(ServerApi::V1);
    
    // Create a new client and connect to the server
    $db_client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);
    $db = $db_client->$db_name;
    
} catch (Exception $e) {
    log_error($e);
    header("Location: ".$_SERVER['DOCUMENT_ROOT']."/error/error404.php");
}

?>