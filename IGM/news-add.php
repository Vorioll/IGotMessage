<?
session_start();
$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');

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
    <link rel="stylesheet" href="style-news-add.css">
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
            <div class="news-form">
                <form action="system/addnew.php" method="POST">

                    <div class="news-form-com">Комментарий</div>
                    <textarea name="text" type="textarea" class="com" placeholder="Добавить Комментарий" autofocus></textarea>
                    <div class="news-add-img">Добавить картинку</div>
                    <input name="url" class="file" type="text" placeholder="Добавить Ссылку на картинку">
                    <div class="button">  
                        <input type="submit" class="but" value="Добавить Новость">
                    </div> 
                </form>
            </div>
        </div>

    </main>


</body>

</html>

