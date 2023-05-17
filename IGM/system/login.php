<?php

session_start();
require_once 'connect.php';

$nick = $_POST['log_nick'];
$password = $_POST['log_password'];


$find_users = $connect->query("SELECT * FROM profile WHERE `nickname` = '$nick' AND `password` = '$password'");



$count = 0;

$userid = $connect->query("SELECT id FROM profile where `nickname` = '$nick'");
$userid = $userid->fetch();

$_SESSION['userid'] = $userid[0];

foreach($find_users as $find_userEl){
    $count+=1;
}

if ($count > 0) {

    $_SESSION['user'] = [
        "id" => $profile['id'],
        "full_name" => $user['full_name']
    ];
    echo "Да";

    header('location: ../message.php');

} else {

}
?>
