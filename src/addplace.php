<?php 

    require './assets/php/db.php';

    $data = $_POST;

    if(isset($data['addPlace'])) {

        $addPlace = R::dispense('place');
        $addPlace -> name = $data['name'];
        $addPlace -> about = $data['about'];
        $addPlace -> adress = $data['adress'];
        $addPlace -> place = $data['place'];
        $addPlace -> tags = $data['tags'];
        $addPlace -> files = $data['files'];
        R::store($addPlace);
    }

?>


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
                <li><a href="#"><img src="./assets/img/plus.svg" alt="plus"></a></li>
            </ul>
        </div>
        <div class="header__search">
            <input type="text" name="search" placeholder="Поиск">
            <img src="./assets/img/search.svg" alt="" class="seacrh__icon">
        </div>
    </header>
    <section class="add">
        <h5 class="add__title">Добавить новое место</h5>
        <div class="add__form">
            <form method="POST" action="./addplace.php">
                <input type="text" name="name" placeholder="Название">
                <input type="text" name="about" placeholder="Описание">
                <input type="text" name="adress" placeholder="Адрес">
                <input type="text" name="place" placeholder="Геогрфическое положение">
                <input type="text" name="tags" placeholder="Теги">
                <input type="file" name="files" multiple>
                <button type="submit" name="addPlace" class="add__btn btn">Добавить</button>
            </form>
        </div>
    </section>
</body>
</html>