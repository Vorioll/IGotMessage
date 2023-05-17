<?
session_start();
$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');
$userid = (int)$_SESSION['userid'];



?>

<!DOCTYPE html>
<html lang="en">

<head>

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-search-freinds.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I Got Messaage</title>
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
        <div class="iystal">
            <div class="container">
                <div class="search">
                    <div class="freins">
                        <div class="search-freinds-title">Найти друга</div>

                            <form method="GET">
                                <input class="search-frd" name='idfriend'type="text" placeholder="Вставьте id Друга">
                                <div class="button">  
                                    <input type="submit" class="but" value="Найти">
                                </div> 
                            </form>


                            <? 
                                
                                $idfriend = $_GET['idfriend'];
                               
                                $searchData = $connect->query("SELECT * FROM profile WHERE id IN ('$idfriend')");
                                
                                
                                foreach($searchData as $search){
                                $friendid = $search['id'];
                                if($idfriend==$userid){}else{
                            ?>


                            <div class="search-freinds">
                                 <img src="<?=$search['avatar']?>" alt="pfp">
                                 <div class="search-freind">
                                    <div class="nickname-freinds"><?=$search['nickname']?></div>
                                     <div class="name"><?=$search['name']?> <?=$search['surname']?></div>
                                </div>
                                <a href="system/addfriends.php?id=<?=$friendid?>">Добавить</a>
                             </div> 
                            <? }?>
                            <? }?>
                           
                        </div>
                    </div>    
            </div>
        </div>
    </main>


</body>

</html>

