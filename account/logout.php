<?php
session_start();

if(!isset($_SESSION['user'])){
  $page = $_SERVER["DOCUMENT_ROOT"]."/account/login.php";
  header('Location: '.$page);
  exit;
}

# Deleting the session that we stored
$_SESSION = array();

if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
  );
}

session_destroy();
header("Location: ../");
exit;