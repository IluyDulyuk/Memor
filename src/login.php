<?php 

    require './assets/php/db.php';

    $data = $_POST;
    $showErrors = False;

    if(isset($data['login'])) {
        $errors = array();
        $showErrors = True;

        if(trim($data['name']) == '') {
            $errors[] = 'Укажите имя';
        }
        if(trim($data['email']) == '') {
            $errors[] = 'Укажите email';
        }
        if(trim($data['password']) == '') {
            $errors[] = 'Укажите пароль';
        }


        if(empty($errors)) {
            $user = R::dispense('users');
            $user -> name = $data['name'];
            $user -> emeil = $data['email'];
            $user -> password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Регистрация</title>
</head>
<body>
    <header class="header">
        <div class="header__menu">
            <a href="./index.html">Главная</a>
        </div>
    </header>
    <section class="login">
        <h3 class="login__title">Регистрация</h3>
        <form method="POST" action="./login.php" class="login__form">
            <input type="text" name="name" placeholder="Введите имя пользователя">
            <input type="email" name="email" placeholder="Введите эл.почту">
            <input type="password" name="password" placeholder="Введите пароль">
            <button type="submit" name="login" class="login__btn btn-form">Регистрация</button>
        </form>
        <p style="color: red;"><?php if($showErrors) { echo showErrors($errors); } ?></p>
        <a class="is-acc"href="./signin.php">Уже есть аккаунт?</a>
    </section>
</body>
</html>