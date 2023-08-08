<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/filter/login-filter.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/account/user.php";

$user = unserialize($_SESSION['user']);

$user_info['picture'] = $user->getPhoto();
$user_info['email'] = $user->getEmail();
$user_info['name'] = $user->getFirstName()." ".$user->getLastName();
$user_info['userId'] = $user->getUserId();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
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
    <li><img src="<?=$user_info['picture'];?>"></li>
    <li><strong>Full Name:</strong> <?=$user_info['name'];?> </li>
    <li><strong>Email:</strong> <?=$user_info['email'];?></li>
    <li><strong>UserId:</strong> <?=$user_info['userId'];?></li>

    <li><a href="logout.php">Logout</a></li>
  </ul>
</body>
</html>