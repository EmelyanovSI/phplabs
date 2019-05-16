<?php
session_start();
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab7</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
    <link rel="stylesheet" href="../styles/lab3.css">
    <link rel="stylesheet" href="../styles/lab7.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
</head>

<body>
<header>
    <div class="divHeader">
        <a href="../index.php"><img class="menuImg" src="../images/greenBlockMenu.png" alt="menu img"></a>
        <div class="title">
            <span class="FIO">Emelyanov Sergey Igorevich</span>
            <span class="option">Option16</span>
        </div>
        <form id="searchBox" action="" method="get">
            <input id="searchText" type="search" name="searchText" placeholder="Search for labs!" autofocus>
            <button id="searchBtn" type="submit" value="search"><i class="fas fa-search"></i></button>
            <input id="search" name="search" type="hidden" value="search">
        </form>
    </div>
    <nav class="navHeader">
        <ul class="mainMenu">
            <li><a href="../lab1/form1.php">Form</a></li>
            <li><a href="add.php">Text file</a></li>
            <li><a href="../lab3/cookies.php">Cookies</a></li>
            <li><a href="../lab4/shop.php">Session</a></li>
            <li><a href="../lab5/regular.html">Regular</a></li>
            <li><a href="../lab6/add.php">Authorization</a></li>
            <li class="active"><a href="add.php">Database</a></li>
            <li><a href="../lab8/lab8.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>Учет продаж в обувном магазине</p>
    <ul class="subMenu">
        <li class="active2"><a href="add.php">ДОБАВИТЬ ДАННЫЕ</a></li>
        <li><a href="view.php">ПРОСМОТР ДАННЫХ</a></li>
        <li><a href="sorting.php">СОРТИРОВКА ДАННЫХ</a></li>
        <li><a href="search.php">ПОИСК ДАННЫХ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form1" action="addScript.php" method="get">
            <fieldset>
                <legend>АССОРТИМЕНТ</legend>

                <label for="name1">Наименование</label>
                <input id="name1" name="name1" type="text" placeholder="Туфли" required
                       pattern="^[A-ZА-ЯЁ][a-zA-Zа-яА-ЯЁ\s]*$">

                <label for="manufacturerInput1">Производитель</label>
                <input id="manufacturerInput1" name="manufacturer1" type="text" placeholder="Лубутен"
                       list="manufacturer1" required
                       pattern="^[A-ZА-ЯЁ][a-zA-Zа-яА-ЯЁ\s]*$">
                <datalist id="manufacturer1">
                    <option value="Nike" name=""></option>
                    <option value="Supreme" name=""></option>
                    <option value="Adidas" name=""></option>
                    <option value="Gucci" name=""></option>
                    <option value="Puma" name=""></option>
                </datalist>

                <label for="site1">Сайт</label>
                <input id="site1" name="site1" type="url"
                       placeholder="http://bukinshoes.ru" value="http://bukinshoes.ru"
                       pattern="http://+[A-Za-z0-9.-]+\.[A-Za-z]{2,4}">

                <label for="date1">Дата выпуска</label>
                <input id="date1" name="date1" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01"
                       pattern="\d{1,2}/\d{1,2}/\d{4}">

                <label for="price1">Цена</label>
                <input id="price1" name="price1" type="range" min="100" max="5000" step="100" value="1000">
                <span id="showPrice1">1000</span>

                <input id="form1request" name="form1request" type="hidden" value="form1request">

            </fieldset>
            <input type="submit" value="Сохранить" name="form1Btn">
            <input type="reset" value="Очистить">
        </form>

        <form name="form2" action="addScript.php" method="get">
            <fieldset>
                <legend>ПОСТУПЛЕНИЕ</legend>

                <label for="name2">Наименование</label>
                <select id="name2" name="name2">
                    <option>Туфли</option>
                    <option>Кроссовки</option>
                    <option>Тапки</option>
                    <option>Ботинки</option>
                    <option>Кроксы</option>
                    <option>Шлепки</option>
                </select>

                <label for="number2">Количество</label>
                <input id="number2" name="number2" type="number" min="1" max="100" value="1"
                       pattern="[0-9]{3}">

                <label for="date2">Дата поступления</label>
                <input id="date2" name="date2" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01"
                       pattern="\d{1,2}/\d{1,2}/\d{4}">

                <label for="tel2">Номер телефона</label>
                <input id="tel2" name="tel2" type="tel" placeholder="+999-(99)-999-99-99"
                       pattern="^((80|\+375)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$">

                <input id="form2request" name="form2request" type="hidden" value="form2request">

            </fieldset>
            <input type="submit" value="Сохранить" name="form2Btn">
            <input type="reset" value="Очистить">
        </form>

        <form name="form3" action="addScript.php" method="get">
            <fieldset>
                <legend>ПРОДАЖА</legend>

                <label for="name3">Наименование</label>
                <div id="name3">
                    <input type="checkbox" name="shoes['Туфли']" value="Туфли" title="Туфли">
                    <input type="checkbox" name="shoes['Кроссовки']" value="Кроссовки" title="Кроссовки">
                    <input type="checkbox" name="shoes['Тапки']" value="Тапки" title="Тапки">
                    <input type="checkbox" name="shoes['Ботинки']" value="Ботинки" title="Ботинки">
                    <input type="checkbox" name="shoes['Кроксы']" value="Кроксы" title="Кроксы" checked>
                    <input type="checkbox" name="shoes['Шлепки']" value="Шлепки" title="Шлепки">
                </div>

                <label for="number3">Количество</label>
                <div id="number3">
                    <input type="radio" name="number[]" value="1" title="1" checked>
                    <input type="radio" name="number[]" value="2" title="2">
                    <input type="radio" name="number[]" value="3" title="3">
                    <input type="radio" name="number[]" value="4" title="4">
                    <input type="radio" name="number[]" value="5" title="5">
                    <input type="radio" name="number[]" value="6" title="6">
                </div>

                <label for="date3">Дата продажи</label>
                <input id="date3" name="date3" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01"
                       pattern="\d{1,2}/\d{1,2}/\d{4}">

                <label for="email3">E-mail</label>
                <input id="email3" name="email3" type="email"
                       value="emelyanov@gmail.com" placeholder="emelyanov@gmail.com"
                       pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}">

                <input id="form3request" name="form3request" type="hidden" value="form3request">

            </fieldset>
            <input type="submit" value="Сохранить" name="form3Btn">
            <input type="reset" value="Очистить">
        </form>
    </div>

</main>

<!--<aside>

</aside>-->

<footer>
    <span>Emelyanov Sergey ITS-21<sup>&#169;</sup></span>
    <span>
            E-mail:
            <a href="mailto: emelyanovsergeyofficial@gmail.com" target="_blank" title="Emelyanov Sergey">
                emelyanovsergeyofficial@gmail.com
            </a>
        </span>
</footer>

<script src="../scripts/main.js" type="text/javascript" language="JavaScript"></script>
<script src="../scripts/jquery-3.4.0.js" type="text/javascript" language="JavaScript"></script>
<script src="../scripts/navigation.js" type="text/javascript" language="JavaScript"></script>
<script>
    showPrice();
</script>

</body>

</html>
