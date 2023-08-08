<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/filter/login-filter.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/account/user.php";

$user = new User($_GET['uid']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $user->getFirstName();?></title>
  <style>
    body{
      padding: 50px;
    }
    ul{
      list-style: none;
    }
    li{
      margin-bottom: 5px;
    }
  </style>
</head>
<body>
<ul>
    <li><img src="<?=$user->getPhoto();?>"></li>
    <li><strong>Full Name:</strong> <?=$user->getFirstName()." ".$user->getLastName();?> </li>
    <li><strong>Email:</strong> <?=$user->getEmail();?></li>

  </ul>
</body>
</html>