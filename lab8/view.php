<?php
session_start();
function get_user($id)
{
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $password = 'usbw'; //пароль, по умолчанию пустой
    $db_name = 'test'; //имя базы данных

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_set_charset($link, 'utf8');

    $result = mysqli_query($link, "SELECT * FROM users WHERE id=$id") or die(mysqli_error($link));
    $rows = mysqli_num_rows($result);

    mysqli_close($link);
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $row;
}
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab8</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
    <link rel="stylesheet" href="../styles/lab3.css">
    <link rel="stylesheet" href="../styles/lab6.css">
    <link rel="stylesheet" href="../styles/lab7.css">
    <link rel="stylesheet" href="../styles/lab8.css">
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
            <li><a href="../lab2/add.php">Text file</a></li>
            <li><a href="../lab3/cookies.php">Cookies</a></li>
            <li><a href="../lab4/shop.php">Session</a></li>
            <li><a href="../lab5/regular.html">Regular</a></li>
            <li><a href="../lab6/add.php">Authorization</a></li>
            <li><a href="../lab7/add.php">Database</a></li>
            <li class="active"><a href="add.php">Registration and database</a></li>
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
        $user = get_user($_SESSION['auth']['id']);
        if ($user[8] > time()) {
            date_default_timezone_set("UTC");
            try {
                $dd = (new DateTime())->setTimestamp($user[8]);
            } catch (Exception $e) {
            }
            try {
                $now = new DateTime();
            } catch (Exception $e) {
            }
            $dif = date_diff($now, $dd);
            $dif = $dif->d . ' д. ' . $dif->h . ' ч. ' . $dif->i . ' м. ' . $dif->s . ' с. ';
            echo '<p class="notFind">Вы забанены на ' . $dif . '</p>';
        } else {

            $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
            $user = 'root'; //имя пользователя, по умолчанию это root
            $password = 'usbw'; //пароль, по умолчанию пустой
            $db_name = 'test'; //имя базы данных

            $link = mysqli_connect($host, $user, $password, $db_name);
            mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
            mysqli_query($link, "SET CHARACTER SET 'utf8'");
            mysqli_set_charset($link, 'utf8');

            $table = 'rang'; //задаем имя таблицы в переменной
            $result = mysqli_query($link, "SELECT * FROM " . $table . " WHERE id > 0")
            or die(mysqli_error($link));

            $table = "<table>";
            $table .= "<caption>АССОРТИМЕНТ</caption>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Производитель</th>";
            $table .= "<th>Сайт</th>";
            $table .= "<th>Дата выпуска</th>";
            $table .= "<th>Цена</th>";
            $table .= "</tr>";

            $rows = mysqli_num_rows($result);
            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                $table .= "<tr>";
                for ($j = 1; $j < 6; ++$j) $table .= "<td>$row[$j]</td>";
                $table .= "</tr>";
            }
            mysqli_free_result($result);
            $table .= "</table>";
            echo $table;

            $table = 'receipt';
            $result = mysqli_query($link, "SELECT * FROM " . $table . " WHERE id > 0")
            or die(mysqli_error($link));

            $table = "<table>";
            $table .= "<caption>ПОСТУПЛЕНИЕ</caption>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Количество</th>";
            $table .= "<th>Дата поступления</th>";
            $table .= "<th>Номер телефона</th>";
            $table .= "</tr>";

            $rows = mysqli_num_rows($result);
            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                $table .= "<tr>";
                for ($j = 1; $j < 5; ++$j) $table .= "<td>$row[$j]</td>";
                $table .= "</tr>";
            }
            mysqli_free_result($result);
            $table .= "</table>";
            echo $table;

            $table = 'sale';
            $result = mysqli_query($link, "SELECT * FROM " . $table . " WHERE id > 0")
            or die(mysqli_error($link));

            $table = "<table>";
            $table .= "<caption>ПРОДАЖА</caption>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Количество</th>";
            $table .= "<th>Дата продажи</th>";
            $table .= "<th>E-mail</th>";
            $table .= "</tr>";

            $rows = mysqli_num_rows($result);
            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                $table .= "<tr>";
                for ($j = 1; $j < 5; ++$j) $table .= "<td>$row[$j]</td>";
                $table .= "</tr>";
            }
            mysqli_free_result($result);
            $table .= "</table>";
            echo $table;

            mysqli_close($link);

        }
    } else echo '<p class="notFind">Войдите на сайт для просмотра данных.</p>';
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
