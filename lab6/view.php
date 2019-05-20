<?php
session_start();
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab6</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
    <link rel="stylesheet" href="../styles/lab3.css">
    <link rel="stylesheet" href="../styles/lab6.css">
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
        <?php include('logButton.php'); ?>
    </div>
    <nav class="navHeader">
        <ul class="mainMenu">
            <li><a href="../lab1/form1.php">Form</a></li>
            <li><a href="add.php">Text file</a></li>
            <li><a href="../lab3/cookies.php">Cookies</a></li>
            <li><a href="../lab4/shop.php">Session</a></li>
            <li><a href="../lab5/regular.html">Regular</a></li>
            <li class="active"><a href="add.php">Authorization</a></li>
            <li><a href="../lab7/add.php">Database</a></li>
            <li><a href="../lab8/add.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>Учет продаж в обувном магазине</p>
    <ul class="subMenu">
        <li><a href="add.php">ДОБАВИТЬ ДАННЫЕ</a></li>
        <li class="active2"><a href="view.php">ПРОСМОТР ДАННЫХ</a></li>
        <li><a href="sorting.php">СОРТИРОВКА ДАННЫХ</a></li>
        <li><a href="search.php">ПОИСК ДАННЫХ</a></li>
    </ul>
</nav>

<main>

    <?php
    if (isset($_SESSION['auth']) and $_SESSION['auth']['success']) {
        $form1File = fopen("range.txt", 'r') or die("Не удалось открыть файл 'АССОРТИМЕНТ'");
        $table = "<table>";
        $table .= "<caption>АССОРТИМЕНТ</caption>";
        $table .= "<tr>";
        $table .= "<th>Наименование</th>";
        $table .= "<th>Производитель</th>";
        $table .= "<th>Сайт</th>";
        $table .= "<th>Дата выпуска</th>";
        $table .= "<th>Цена</th>";
        $table .= "</tr>";

        while (!feof($form1File)) {
            $str = htmlentities(fgets($form1File));
            if (!empty($str)) {
                $table .= "<tr>";
                $mas = explode(";", $str);
                $table .= "<td>" . $mas[0] . "</td>";
                $table .= "<td>" . $mas[1] . "</td>";
                $table .= "<td>" . $mas[2] . "</td>";
                $table .= "<td>" . $mas[3] . "</td>";
                $table .= "<td>" . $mas[4] . "</td>";
                $table .= "</tr>";
            }
        }
        fclose($form1File);
        $table .= "</table>";
        echo $table;

        $form2File = fopen("receipt.txt", 'r') or die("Не удалось открыть файл 'ПОСТУПЛЕНИЕ'");
        $table = "<table>";
        $table .= "<caption>ПОСТУПЛЕНИЕ</caption>";
        $table .= "<tr>";
        $table .= "<th>Наименование</th>";
        $table .= "<th>Количество</th>";
        $table .= "<th>Дата поступления</th>";
        $table .= "<th>Номер телефона</th>";
        $table .= "</tr>";

        while (!feof($form2File)) {
            $str = htmlentities(fgets($form2File));
            if (!empty($str)) {
                $table .= "<tr>";
                $mas = explode(";", $str);
                $table .= "<td>" . $mas[0] . "</td>";
                $table .= "<td>" . $mas[1] . "</td>";
                $table .= "<td>" . $mas[2] . "</td>";
                $table .= "<td>" . $mas[3] . "</td>";
                $table .= "</tr>";
            }
        }
        fclose($form2File);
        $table .= "</table> ";
        echo $table;

        $form3File = fopen("sale.txt", 'r') or die("Не удалось открыть файл 'ПРОДАЖА'");
        $table = "<table>";
        $table .= "<caption>ПРОДАЖА</caption>";
        $table .= "<tr>";
        $table .= "<th>Наименование</th>";
        $table .= "<th>Количество</th>";
        $table .= "<th>Дата продажи</th>";
        $table .= "<th>E-mail</th>";
        $table .= "</tr>";

        while (!feof($form3File)) {
            $str = htmlentities(fgets($form3File));
            if (!empty($str)) {
                $table .= "<tr>";
                $mas = explode(";", $str);
                $table .= "<td>" . $mas[0] . "</td>";
                $table .= "<td>" . $mas[1] . "</td>";
                $table .= "<td>" . $mas[2] . "</td>";
                $table .= "<td>" . $mas[3] . "</td>";
                $table .= "</tr>";
            }
        }
        fclose($form3File);
        $table .= "</table> ";
        echo $table;
    } else echo '<p class="notFind swing">Войдите на сайт для просмотра данных.</p>';
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
<script src="../scripts/jquery-3.4.0.js" type="text/javascript" language="JavaScript"></script>
<script src="../scripts/navigation.js" type="text/javascript" language="JavaScript"></script>

</body>

</html>
