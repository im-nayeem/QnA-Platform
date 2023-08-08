<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/account/auth-config.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/account/user.php");

if(!isset($_SESSION)) 
        session_start();
if(isset($_SESSION['user']))
{
  header('Location: profile.php');
}
// the createAuthUrl() method generates the login URL.
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
  $user = new User($token, $google_client);
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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>
    <form>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Login</button>
      <div class="google-login">
        <span>Or Login with:</span>
        <a href="<?=$login_url;?>" class="google-icon"><img src="/assets/google.png" alt="google logo">Google</a>
        <a href="" class="google-icon"><img src="/assets/fb.png" alt="fb logo">Facebook</a>
      </div>
    </form>
  </div>
</body>
</html>
