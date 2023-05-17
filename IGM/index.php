<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>I Got Message</title>

</head>
<body>
    
<header>

    <div class="logo">

        <img src="img/logo.png" alt="$">

        <h1>I Got Message</h1>

    </div>    

</header>

<main>

    <div class="container">

        <div class="autorization">

            <div class="login auto_forms">

                <h2>Вход</h2>

                <form action="system/login.php" method="POST">

                    <p>Никнейм</p>

                    <input type="text" name="log_nick">

                    <p>Пароль</p>

                    <input type="password" name="log_password">

                    <input type="submit" value="Войти">

                </form>

            </div>

            <div class="regis auto_forms">

                <h2>Регистрация</h2>

                <form action="system/signup.php" method="POST">

                    <p>Никнейм</p>

                    <input type="text" name="reg_nick">

                    <p>Имя</p>

                    <input type="text" name="reg_name">

                    <p>Фамилия</p>

                    <input type="text" name="reg_surname">

                    <p>Пароль</p>

                    <input type="password" name="reg_password">

                    <p>Подтвердите пароль</p>

                    <input type="password" name="reg_password_confirm">

                    <p>Аватарка</p>

                    <input type="text" name="avatar" placeholder="Введите ссылку">

                    <input type="submit" value="Начать!">

                </form>

            </div>

        </div>

    </div>

</main>



</body>
</html>