<?
session_start();
$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');
if ($_SESSION['userid']){
    
}else{
    header("location: index.php");
}
$userid = (int)$_SESSION['userid'];
$profuserid = (int)$_GET['user'];
$oprofileData = $connect->query("SELECT * FROM profile WHERE id IN ('$profuserid')");
$profileData = $connect->query("SELECT * FROM profile WHERE id IN ('$userid')");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-prof_friends.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Шаблон</title>
</head>

<body>

    <header>

        <div class="nav">

            <div class="nav_left">

                <a href="news.php">НОВОСТИ</a>
                <a href="message.php">СООБЩЕНИЯ</a>
                <a href="friends.php">ДРУЗЬЯ</a>

            </div>

            <div class="nav_right">
                <? foreach($profileData as $prof){ ?>
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

            <div class="profile">

                <div class="info">
                   <?
                    $oprofileData = $connect->query("SELECT * FROM profile WHERE id IN ('$profuserid')");
                    foreach($oprofileData as $oprof){ 
                    $author = $oprof['id'];
                        ?>
                    <img src="<?=$oprof['avatar']?>" alt="dima">
                    <div class="name">
                        <p><?=$oprof['nickname']?></p>
                        <p><?=$oprof['name']?></p>
                        <p><?=$oprof['surname']?></p>
                        <p>#<?=$oprof['id']?></p>
                        <? if($userid == $profuserid){?>
                        <a href="system/logout.php">Выйти с Аккаунта</a>
                        <?}?>
                    </div>
                    <? } ?>
                    
                </div>

                    <div class="comm">
                        <form action="system/comments.php?author=<?=$userid?>&user=<?=$author?>" method="POST">
                            <p>Комментарии:</p>
                            <input type="text" placeholder="Написать комментарий" name="text">
                            <input type="submit" value="Отправить">
                        </form>
                    </div>

                    <div class="comments">


                    <? 
                    $user = $_GET['user'];
                    $comms = $connect->query("SELECT * FROM comments WHERE id_prof IN ('$user')");
                    
                    foreach($comms as $comm){
                    $authorid = $comm['id_author'];

                    $authorcomms = $connect->query("SELECT * FROM profile WHERE id IN ('$authorid')");

                    ?>
                        <div class="comm_block">
                            <? foreach($authorcomms as $authorcomm){?>
                            <img src="<?=$authorcomm['avatar']?>" alt="den">
                            <?}?>
                            <div class="comm_info">
                            <? foreach($authorcomms as $authorcomm){?>
                                <p><?=$authorcomm['nick']?></p>
                            <?}?>
                                <p><?=$comm['text']?></p>
                                <p><?=$comm['data']?></p>

                                
                            </div>
                            
                        </div>
                    <?}?> 

                    </div>
                    </div>


                </div>

            </div>


        </div>

    </main>



</body>

</html>
