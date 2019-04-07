<?php
session_start();
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>lab4</title>
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
    <p>Обувной магазин</p>
    <ul class="subMenu">
        <li><a href="shop.php">ТОВАРЫ</a></li>
        <li class="active2"><a href="bin.php">КОРЗИНА</a></li>
        <li><a href="utils.php">ВРЕМЯ СЧЕТЧИК EMAIL</a></li>
        <li><a href="form1.php">ФОРМЫ</a></li>
        <li><a href="#">СБРОС ФОРМЫ</a></li>
        <li><a href="#">ТЕСТ</a></li>
    </ul>
</nav>

<main>

    <?php
    if (isset($_SESSION['cart'])) {
        $table = "<table>";
        $table .="<tr>
			        <th>Название товара</th>
			        <th>Цена</th>
			        <th>Количество</th>
			        <th>Сумма</th>
			      </tr>";
        $sum = 0;
        foreach ($_SESSION['cart'] as $id => $value) {
            $table .= "<tr>";
            $table .= "<td>" . $id . "</td>";
            $table .= "<td>" . $value['price'] . "</td>";
            $table .= "<td>" . $value['quantity'] . "</td>";
            $table .= "<td>" . $value['price'] * $value['quantity'] . "</td>";
            $table .= "</tr>";
            $sum += $value['price'] * $value['quantity'];

        }
        $table .= "</table> ";
        echo $table;
        echo '<p class="added swing">Общая сумма: ' . $sum . ' р</p>';
    } else echo '<p class="added swing">Корзина пуста!</p>';
    ?>

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
