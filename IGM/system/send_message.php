<?php
session_start();
$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');
$chat=$_GET['chat'];

$nazvanie=$_GET['nazv'];
$nazv = "chat".$nazvanie;
echo $nazv;
echo $chat;
$userid = $_SESSION['userid'];

$text = $_POST['chat_text'];


$date = date("Y-m-j");

$connect->query("INSERT INTO $nazv (id_message, ids, mestext, mesdata) VALUES (NULL, '$userid', '$text', '$date')");
header("location: ../chat.php?idd=$chat&chat=$nazvanie");
?>