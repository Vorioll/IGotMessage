<?
session_start();
$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');
if ($_SESSION['userid']){
    
}else{
    header("location: index.php");
}
$news = $connect->query("SELECT * FROM news");
$userid = (int)$_SESSION['userid'];
$profuserid = (int)$_GET['user'];
$profileData = $connect->query("SELECT * FROM profile WHERE id IN ('$userid')");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-news.css">
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
            <div class="news-add">
                <div class="news-top-add">
                    <div class="news-add-block">
                        <h2>НОВОСТИ</h2>
                        <form action="news-add.php" method="POST">
                            <input type="submit" value="Добавить Новость">
                        </form>
                    </div>
                </div>    
            </div>  
            
            <div class="news-scroll">
                <div class="news-scroll-block">
                <? 
                
                    foreach($news as $post){
                    
                ?>
                    <div class="news">
                        <div class="news-top">
                            <div class="news-left">
                                <? 
                                $author = $post['id_author'];
                                $authorData = $connect->query("SELECT * FROM profile WHERE id IN ('$author')");
                                foreach($authorData as $authorEl){{}
                                ?>
                                <img src="<?=$authorEl['avatar']?>" alt="">
                                <?}?>
                            </div>
                            <div class="news-right">
                                <?
                                $authorData = $connect->query("SELECT * FROM profile WHERE id IN ('$author')");
                                foreach($authorData as $authorEl){{}
                                ?>
                                <div class="news-nickname"><?=$authorEl['nickname']?></div>
                                <?}?>
                                <div class="news-data"><?=$post['data']?></div>  
                                
                            </div>
                        </div>
                        <div class="news-bot">
                            <img src="<?=$post['img']?>" alt="">
                        </div>
                    </div>
                <? }?>
                    
                    
                </div>
            </div>
        </div>

    </main>


</body>

</html>
