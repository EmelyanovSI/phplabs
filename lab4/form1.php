<?php
session_start();
if (!empty($_GET)) {
    $_SESSION['form1']['model']=$_GET['model'];
    $_SESSION['form1']['year']=$_GET['year'];
    $_SESSION['form1']['number']=$_GET['number'];
    $_SESSION['form1']['gear']=$_GET['gear'];
    $_SESSION['form1']['Name']=$_GET['Name'];
}
$model='Toyota';
$year='2005';
$number='';
$gear='Механика';
$Name["Control"]='';
if (isset ($_SESSION['form1']))
{
    $model=$_SESSION['form1']['model'];
    $year=$_SESSION['form1']['year'];
    $number=$_SESSION['form1']['number'];
    $gear=$_SESSION['form1']['gear'];
    $Name=$_SESSION['form1']['Name'];
}
//print_r($_SESSION);
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab4</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
    <link rel="stylesheet" href="../styles/lab3.css">
    <link rel="stylesheet" href="../styles/lab4.css">
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
            <button id="searchBtn" type="button" value="search"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <nav class="navHeader">
        <ul class="mainMenu">
            <li><a href="../lab1/form1.php">Form</a></li>
            <li><a href="../lab2/add.php">Text file</a></li>
            <li><a href="../lab3/cookies.php">Cookies</a></li>
            <li class="active"><a href="shop.php">Sessions</a></li>
            <li><a href="#">Regulars</a></li>
            <li><a href="#">Authorization</a></li>
            <li><a href="#">Database</a></li>
            <li><a href="#">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>СЕССИИ: Время прибывания, счетчик обновлений, email</p>
    <ul class="subMenu">
        <li><a href="shop.php">ТОВАРЫ</a></li>
        <li><a href="bin.php">КОРЗИНА</a></li>
        <li><a href="utils.php">ВРЕМЯ СЧЕТЧИК EMAIL</a></li>
        <li class="active2"><a href="form1.php">ФОРМЫ</a></li>
        <li><a href="#">СБРОС ФОРМЫ</a></li>
        <li><a href="#">ТЕСТ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form1" action="" method="get">
            <fieldset>
                <legend>АССОРТИМЕНТ ( РЕЗУЛЬТАТ )</legend>

                <label for="name1">Наименование</label>
                <input id="name1" name="name1" type="text" placeholder="Туфли" required>

                <label for="manufacturerInput1">Производитель</label>
                <input id="manufacturerInput1" name="manufacturer1" type="text" placeholder="Лубутен"
                       list="manufacturer1" required>
                <datalist id="manufacturer1">
                    <option value="Nike" name=""></option>
                    <option value="Supreme" name=""></option>
                    <option value="Adidas" name=""></option>
                    <option value="Gucci" name=""></option>
                    <option value="Puma" name=""></option>
                </datalist>

                <label for="site1">Сайт</label>
                <input id="site1" name="site1" type="url"
                       placeholder="http://bukinshoes.ru" value="http://bukinshoes.ru">

                <label for="date1">Дата выпуска</label>
                <input id="date1" name="date1" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01">

                <label for="price1">Цена</label>
                <input id="price1" name="price1" type="range" min="100" max="5000" step="100" value="1000">
                <span id="showPrice1">1000</span>

                <input id="form1request" name="form1request" type="hidden" value="form1request">

            </fieldset>
            <input type="submit" value="Отправить">
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

</body>

</html>
