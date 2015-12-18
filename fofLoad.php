<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include "session.php";
include 'testRabbitMQClient.php';
session_start();
$sid=$_GET["sid"];
//echo $_SESSION['login_user'];
send("showFriends2",$sid);



?>
</body>
</html>
