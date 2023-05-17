<?
session_start();
$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');

$userid = (int)$_SESSION['userid'];

$userid = $_SESSION['userid'];

$messages = $connect->query("SELECT * FROM messages WHERE myid IN ('$userid') OR id_friend IN ('$userid')");
$users = $connect->query("SELECT * FROM profile WHERE NOT id IN ('$userid')");
$users = $users->fetchall();

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
    <link rel="stylesheet" href="style-mes.css">
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
            <div class="mes-top">
                <div class="top">
                <h2>Ваши соо6щения</h2>
                    <form action="chat.php" method="POST">
                        <input type="submit" value="Создать комнату">
                    </form>
                </div>
                <div class="bot" >

                    <div class="select">
                    <form action="system/addchat.php" method="POST">
                            <select name="addtable" id="" style="font-family: Rubik Mono One;">
                                <? foreach($users as $user){?>
                                    <option style="font-size:16px; font-family: Rubik Mono One;" value="<?=$user['id']?>"><div class="name"><?=$user['nickname']?></div><div class="id">#<?=$user['id']?></div></option>
                                <? } ?>
                            </select>
                        </div>
                        <input type="submit" value="Добавить друга">
                    </form>
                </div>
            </div>




            
            <div class="mes-bot">
            <div class="bot-dawn">
                <?foreach($messages as $msg){
                    $a="chat";
                    $a = $a.$msg['id'];
                    if ($msg['id_friend']==$userid){
                        $formes = $msg['myid'];
                    }else{
                        $formes = $msg['id_friend'];
                    }
                    
                    $userprof = $connect -> query("SELECT * FROM profile  WHERE id IN ('$formes')");
                    $userprof = $userprof->fetchAll();
                    $preview = $connect -> query("SELECT * FROM $a ORDER BY id_message DESC limit 1");
                    $msgid =$msg['id'];
                    $msgid_friend = $msg['id_friend'];
                ?>
                <a href="chat.php?chat=<?=$msgid?>&idd=<?=$msgid_friend?>" class="mes-block">
                    <? foreach($userprof as $userprofel) {?>
                    <div class="mes-left">
                        <img src="<?=$userprofel['avatar']?>" alt="">
                    </div>
                    <?}?>
                    <div class="mes-mid">
                        <? foreach($userprof as $userprofel) {?>
                            <div class="mes-nick"><?=$userprofel['nickname']?></div>
                        <? }
                        foreach($preview as $pre){?>
                            <div class="mes-message"><? if($pre['mestext']){?>
                                <?=$pre['mestext']?></div>
                                <?}?>
                            <? }?>
                    </div>
                    <div class="mes-right">
                        <? foreach($preview as $pre){?>
                            <div class="mes-data"><?=$pre['mesdata']?></div>
                        <?}?>
                    </div>
                </a>
                <?} ?>
                </div>
            </div>
        </div>
    </div>

</main>



</body>
</html>
