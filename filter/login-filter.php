<?php
session_start();

if(!isset($_SESSION['user'])){
  
  $_SESSION['redirect_page'] = $_SERVER['HTTPS'].htmlspecialchars($_SERVER['PHP_SELF']);
  if(isset($_POST))
    $_SESSION['POST'] = $_POST;
  
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $loginPage = $protocol . $_SERVER['HTTP_HOST'] . "/account/login.php";
  
  header('Location: '.$loginPage);
  exit;
}


?>
