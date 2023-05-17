<?
session_start();
$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');
$userid = (int)$_SESSION['userid'];
$friends = $connect->query("SELECT * FROM friends WHERE userid IN ('$userid')");
$friends = $friends->fetchAll();

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

        <div class="section">

            <div class="your_fr">
                <p>Ваши друзья:</p>
                <a href='search-freinds.php'>Поиск</a>
            </div>

            <div class="fr_list">
                
                <?  foreach($friends as $friend){
                    $idfriend = $friend['id_friend'];
                    $friendinfoAll = $connect->query("SELECT * FROM profile WHERE id IN ('$idfriend')");
                    $friendinfoAll = $friendinfoAll->fetchAll();
                    foreach($friendinfoAll as $friendinfoEl){
                ?>
                <div class="fr_block">
                         <img src="<?=$friendinfoEl['avatar']?>" alt="pfp"> 
                        <div class="fr_names">
                            <p><?=$friendinfoEl['nickname']?></p>
                            <p><?=$friendinfoEl['name']?> <?=$friendinfoEl['surname']?></p>
                        </div>
                    <a href="profile.php?user=<?=$idfriend?>">Открыть профиль</a>
                    
                </div>
                <?}
                    }?>
                
            </div>

        </div>

    </main>

</body>

</html>
