<?php
// require_once $_SERVER['DOCUMENT_ROOT']."/db.php";
require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";

if(!isset($_SESSION))
    session_start();
if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['q']))
{
    $query = $_GET['q'];
    // $collections = $db->questions->find;

}
$time = getTime();
echo $time;
?>

<script src="/assets/js/timeConverter.js"></script>
<p id="test"><?php  convertUTCToLocal($time); ?></p>
