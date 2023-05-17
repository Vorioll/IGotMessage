<?
session_start();
$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');

$userid = (int)$_SESSION['userid'];
require_once 'system/connect.php';
$nazvanie1=$_GET['chat'];
$nazvanie = "chat".$nazvanie1;

$chat =$_GET['idd'];



$msgData = $connect->query("SELECT * FROM $nazvanie");
$profileData = $connect->query("SELECT * FROM profile");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-chat.css">
    <title>I Got Message</title>
</head>
<body>

<header>

    <div class="nav">

        <div class="nav_left">

            <a href="news.php">Новости</a>
            <a href="message.php">Сообщения</a>
            <a href="friends.php">Друзья</a>

        </div>

        <div class="nav_right">
        <?
        $profileData = $connect->query("SELECT * FROM profile WHERE id IN ('$userid')");
                foreach($profileData as $prof){ ?>
               <a href="profile.php?user=<?=$userid?>">

                    <img src="<?=$prof['avatar']?>" alt="#">

                    <p>ПРОФИЛЬ</p>

                </a>
                <? } ?>

        </div>
    </div>

</header>

<main>

    <div class="container">
        <div class="message">

            <a href="profile.php?user=<?=$chat?>"class="message_name">
            <? 
                $formes = $chat;
                $userprof = $connect -> query("SELECT * FROM profile  WHERE id IN ('$formes')");
                $userprof = $userprof->fetchAll(); 
                foreach($userprof as $userprofel){?>        
                <img src="<?=$userprofel['avatar']?>" alt="#">
                <h2><?=$userprofel['nickname']?></h2>
                <?}?>
                
            </a>
            <div class="message_content">

            <? foreach($msgData as $msg) { ?>

                <div class="msg">
                <? 

                $formes = $msg['ids'];
                $userprof = $connect -> query("SELECT * FROM profile  WHERE id IN ('$formes')");
                $userprof = $userprof->fetchAll(); 
                foreach($userprof as $userprofel){?>    
                <img src="<?=$userprofel['avatar']?>" alt="#">
                <?}?>


                    <div class="msg_text">

                        <p><?=$msg['mesdata']?></p>

                        <p><?=$msg['mestext']?></p>

                    </div>


                </div>

            <? } ?>

            </div>



            <div class="message_send">

                <form action="system/send_message.php?chat=<?=$chat?>&nazv=<?=$nazvanie1?>" method="POST">

                    <input type="text" placeholder="Введите сообщение" name="chat_text">

                    <input type="submit" value="">

                </form>



            </div>
        </div>
    </div>

</main>



</body>
</html>
