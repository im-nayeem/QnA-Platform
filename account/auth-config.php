<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");

# Add your client ID and Secret
$google_client = new Google\Client();
$google_client->setClientId($google_client_id);
$google_client->setClientSecret($google_client_secret);

# redirection location is the path to login.php
$redirect_uri = 'http://localhost:5500/account/login.php';
$google_client->setRedirectUri($redirect_uri);
$google_client->addScope("email");
$google_client->addScope("profile");

?>