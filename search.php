<?php
require_once $_SERVER['DOCUMENT_ROOT']."/utility.php";
$time = "2023-08-14 12:20";
?>

<script src="/assets/js/timeConverter.js"></script>
<p id="test"><?php  convertUTCToLocal($time); ?></p>
