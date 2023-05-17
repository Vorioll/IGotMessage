<?php

session_start();
require_once 'connect.php';

$nickname = $_POST['reg_nick'];
$name = $_POST['reg_name'];
$surname = $_POST['reg_surname'];
$password = $_POST['reg_password'];
$password_confirm = $_POST['reg_password_confirm'];
$avatar = $_POST['avatar'];

$find_users = $connect->query("SELECT * FROM profile WHERE `nickname` = '$nick'");
$count = 0;
foreach($find_users as $find_userEl){
    $count+=1;
}
if ($count > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой логин уже существует",
        "fields" => ['nickname']
    ];

    echo json_encode($response);
    die();
}


if ($password === $password_confirm) {

    $connect->query("INSERT INTO profile (nickname, name, surname, password, avatar) VALUES ('$nickname', '$name', '$surname', '$password', '$avatar')");

    header('location: ../index.php');
} else {
    header('location: ../index.php');
}

?>
