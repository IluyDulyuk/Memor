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
    <section class="places">
        <ul class="places__list">
            <a href="./place.html" style="color: #000; display: flex;">
                <li class="places__item">
                    <h5 class="places__item-title">Аляска</h5>
                    <img src="./assets/img/arrow.svg" alt="arrow" class="arrow">
                    <a href="./place.html"></a>
                </li>
            </a>
        </ul>
    </section>
</body>
</html>