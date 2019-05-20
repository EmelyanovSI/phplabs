<?php
session_start();
if (isset($_GET['shoeTitle'])) {
    $name = $_GET['shoeTitle'];
    if (isset($_SESSION['cart'][$name])) {
        $_SESSION['cart'][$name]['quantity']++;

    } else {
        $_SESSION['cart'][$name] = array(
            "quantity" => 1,
            "price" => intval($_GET['price'])
        );
    }
    header("Location:/phplabs/lab4/shop.php");
    exit;
}
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
            <li class="active"><a href="shop.php">Session</a></li>
            <li><a href="../lab5/regular.html">Regular</a></li>
            <li><a href="../lab6/add.php">Authorization</a></li>
            <li><a href="../lab7/add.php">Database</a></li>
            <li><a href="../lab8/add.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>Обувной магазин</p>
    <ul class="subMenu">
        <li class="active2"><a href="shop.php">ТОВАРЫ</a></li>
        <li><a href="bin.php">КОРЗИНА</a></li>
        <li><a href="utils.php">ВРЕМЯ СЧЕТЧИК EMAIL</a></li>
        <li><a href="form1.php">ФОРМЫ</a></li>
        <li><a href="logout.php">РАЗРУШИТЬ СЕССИЮ</a></li>
        <li><a href="test/1.php">ТЕСТ</a></li>
    </ul>
</nav>

<main>

    <div class="shoeShop">
        <div class="swing">
            <div><img src="images/ботинки.jpg" alt="Ботинки"></div>
            <div>
                <p class="shoeTitle">Ботинки</p>
                <p class="price">39 р</p>
                <div class="addToRecycleBin"><a href="?shoeTitle=Ботинки&price=39"
                                                onclick="alert('Товар добавлен в корзину')">Добавить в корзину</a></div>
            </div>
        </div>

        <div class="swing">
            <div><img src="images/кеды.jpg" alt="Кеды"></div>
            <div class="describe">
                <p class="shoeTitle">Кеды</p>
                <p class="price">38 р</p>
                <div class="addToRecycleBin"><a href="?shoeTitle=Кеды&price=38"
                                                onclick="alert('Товар добавлен в корзину')">Добавить в корзину</a></div>
            </div>
        </div>

        <div class="swing">
            <div><img src="images/кроссовки.jpg" alt="Кроссовки"></div>
            <div class="describe">
                <p class="shoeTitle">Кроссовки</p>
                <p class="price">49 р</p>
                <div class="addToRecycleBin"><a href="?shoeTitle=Кроссовки&price=49"
                                                onclick="alert('Товар добавлен в корзину')">Добавить в корзину</a></div>
            </div>
        </div>

        <div class="swing">
            <div><img src="images/лоферы.jpg" alt="Лоферы"></div>
            <div class="describe">
                <p class="shoeTitle">Лоферы</p>
                <p class="price">86 р</p>
                <div class="addToRecycleBin"><a href="?shoeTitle=Лоферы&price=86"
                                                onclick="alert('Товар добавлен в корзину')">Добавить в корзину</a></div>
            </div>
        </div>

        <div class="swing">
            <div><img src="images/мокасины.jpg" alt="Мокасины"></div>
            <div class="describe">
                <p class="shoeTitle">Мокасины</p>
                <p class="price">99 р</p>
                <div class="addToRecycleBin"><a href="?shoeTitle=Мокасины&price=99"
                                                onclick="alert('Товар добавлен в корзину')">Добавить в корзину</a></div>
            </div>
        </div>

        <div class="swing">
            <div><img src="images/сапоги.jpg" alt="Сапоги"></div>
            <div class="describe">
                <p class="shoeTitle">Сапоги</p>
                <p class="price">42 р</p>
                <div class="addToRecycleBin"><a href="?shoeTitle=Сапоги&price=42"
                                                onclick="alert('Товар добавлен в корзину')">Добавить в корзину</a></div>
            </div>
        </div>

        <div class="swing">
            <div><img src="images/туфли.jpg" alt="Туфли"></div>
            <div class="describe">
                <p class="shoeTitle">Туфли</p>
                <p class="price">120 р</p>
                <div class="addToRecycleBin"><a href="?shoeTitle=Туфли&price=120"
                                                onclick="alert('Товар добавлен в корзину')">Добавить в корзину</a></div>
            </div>
        </div>
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

</body>

</html>
