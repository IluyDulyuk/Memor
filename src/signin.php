<?php 

    require './assets/php/db.php';

    $data = $_POST;
    $showErrors = False;

    if(isset($data['signin'])) {
        $errors = array();
        $showErrors = True;

        if(trim($data['email']) == '') {
            $errors[] = 'Укажите email';
        }
        if(trim($data['password']) == '') {
            $errors[] = 'Укажите пароль';
        }


        $user = R::findOne('users', 'email = ?', array($data['email']));

        if($user) {
            if(password_verify($data['password'], $user -> password)) {
                $_SESSION['user'] = $user;
            } else {
                $errors[] = 'Неверный пароль';
            }
        } else {
            $errors[] = 'Пользователь не найден';
        }
    }

?>

<?php 

    $user = R::findOne('users', 'id = ?', array($_SESSION['user'] -> id));

?>

<?php if($user) : ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/style.css">
        <title>Главная</title>
    </head>
    <body>
        <header class="header-big">
            <div class="header-big__menu">
                <ul class="menu__list">
                    <li><a href="./index.php">Главная</a></li>
                    <li><a href="./signin.php">Аккаунт</a></li>
                    <li><a href="./addplace.php"><img src="./assets/img/plus.svg" alt="plus"></a></li>
                </ul>
            </div>
            <div class="header__search">
                <input type="text" name="search" placeholder="Поиск">
                <img src="./assets/img/search.svg" alt="" class="seacrh__icon">
            </div>
        </header>
        <section class="user">
            <h5 class="user__title">Аккаунт</h5>
            <ul class="user__list">
                <li class="user__item">Имя: <span id="user__login"><?php echo $user['name'] ?></span></li>
                <li class="user__item">Email: <span id="user__email"><?php echo $user['email'] ?></span></li>
            </ul>
            <button class="btn change__password-btn">Изменить пароль</button>
            <a style="color: red; margin-left: 20px;" href="./logout.php">Выйти</a>
        </section>
    </body>
    </html>
<?php else : ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/style.css">
        <title>Вход</title>
    </head>
    <body>
        <header class="header">
            <div class="header__menu">
                <a href="./index.html">Главная</a>
            </div>
        </header>
        <section class="login">
            <h3 class="login__title">Вход</h3>
            <form method="POST" action="./signin.php" class="login__form">
                <input type="email" name="email" placeholder="Введите эл.почту">
                <input type="password" name="password" placeholder="Введите пароль">
                <button name="signin" class="login__btn btn-form">Войти</button>
            </form>
            <p style="color: red;"><?php if($showErrors) { echo showErrors($errors); } ?></p>
            <a class="no-acc"href="./login.php">Нет акаунта?</a>
        </section>
    </body>
    </html>
<?php endif; ?>