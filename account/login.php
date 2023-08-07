<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/account/auth-config.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/account/user.php");

if(!isset($_SESSION)) 
        session_start();
if(isset($_SESSION['user']))
{
  header('Location: profile.php');
}
# the createAuthUrl() method generates the login URL.
$login_url = $google_client->createAuthUrl();
/* 
 * After obtaining permission from the user,
 * Google will redirect to the login.php with the "code" query parameter.
*/
if (isset($_GET['code'])):
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
  if(isset($token['error'])){
    header('Location: login.php');
    exit;
  }
  
  // create User instance and get user info by access token 
  $user = new User($token);
  $_SESSION['user'] = serialize($user);

  // redirect to requested page
  if(!isset($_SESSION['redirect_page'])){
    $_SESSION['redirect_page'] = "/";
  }
  $page = 'Location: '.$_SESSION['redirect_page'];
  
  $_SESSION['redirect_page'] = "";
  
  header($page);

  exit;

endif;
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="btn">
    <a href="<?= $login_url ?>"><img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt="Google Logo"> Login with Google</a>
    </div>
</body>
</html>