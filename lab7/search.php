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
        <li><a href="add.php">ДОБАВИТЬ ДАННЫЕ</a></li>
        <li><a href="view.php">ПРОСМОТР ДАННЫХ</a></li>
        <li><a href="sorting.php">СОРТИРОВКА ДАННЫХ</a></li>
        <li class="active2"><a href="search.php">ПОИСК ДАННЫХ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form1" action="" method="get">
            <fieldset>
                <label for="name1">АССОРТИМЕНТ</label>
                <select id="name1" name="name1">
                    <option value="name1">Наименование</option>
                    <option value="manufacturer1">Производитель</option>
                    <option value="site1">Сайт</option>
                    <option value="date1">Дата выпуска</option>
                    <option value="price1">Цена</option>
                </select>
                <input id="search1" name="search1" type="text" placeholder="Поиск...">
            </fieldset>
            <input type="submit" value="Найти" name="form1Btn">
        </form>

        <form name="form2" action="" method="get">
            <fieldset>
                <label for="name2">ПОСТУПЛЕНИЕ</label>
                <select id="name2" name="name2">
                    <option value="name2">Наименование</option>
                    <option value="number2">Количество</option>
                    <option value="date2">Дата поступления</option>
                    <option value="tel2">Номер телефона</option>
                </select>
                <input id="search2" name="search2" type="text" placeholder="Поиск...">
            </fieldset>
            <input type="submit" value="Найти" name="form2Btn">
        </form>

        <form name="form3" action="" method="get">
            <fieldset>
                <label for="name3">ПРОДАЖА</label>
                <select id="name3" name="name3">
                    <option value="shoes">Наименование</option>
                    <option value="number">Количество</option>
                    <option value="date3">Дата продажи</option>
                    <option value="email3">E-mail</option>
                </select>
                <input id="search3" name="search3" type="text" placeholder="Поиск...">
            </fieldset>
            <input type="submit" value="Найти" name="form3Btn">
        </form>
    </div>

    <?php
    $notFind = "<p class='notFind'>Ничего не найдено</p>";

    if (isset($_GET['form1Btn'])) {

        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $user = 'root'; //имя пользователя, по умолчанию это root
        $password = 'usbw'; //пароль, по умолчанию пустой
        $db_name = 'test'; //имя базы данных

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

        $table = 'rang';
        $num = $_GET['name1'];
        $srch = $_GET['search1'];

        $result = mysqli_query($link, "SELECT*FROM " . $table . " WHERE " . $num . "='" . $srch . "'")
        or die(mysqli_error($link));
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
            $table = "<table>";
            $table .= "<caption>АССОРТИМЕНТ</caption>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Производитель</th>";
            $table .= "<th>Сайт</th>";
            $table .= "<th>Дата выпуска</th>";
            $table .= "<th>Цена</th>";
            $table .= "</tr>";

            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                $table .= "<tr>";
                for ($j = 1; $j < 6; ++$j) $table .= "<td>$row[$j]</td>";
                $table .= "</tr>";
            }
            mysqli_free_result($result);
            $table .= "</table>";
            echo $table;
        } else echo $notFind;
        mysqli_close($link);
    }

    if (isset($_GET['form2Btn'])) {

        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $user = 'root'; //имя пользователя, по умолчанию это root
        $password = 'usbw'; //пароль, по умолчанию пустой
        $db_name = 'test'; //имя базы данных

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

        $table = 'receipt';
        $num = $_GET['name2'];
        $srch = $_GET['search2'];

        $result = mysqli_query($link, "SELECT*FROM " . $table . " WHERE " . $num . "='" . $srch . "'")
        or die(mysqli_error($link));
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
            $table = "<table>";
            $table .= "<caption>ПОСТУПЛЕНИЕ</caption>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Количество</th>";
            $table .= "<th>Дата поступления</th>";
            $table .= "<th>Номер телефона</th>";
            $table .= "</tr>";

            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                $table .= "<tr>";
                for ($j = 1; $j < 5; ++$j) $table .= "<td>$row[$j]</td>";
                $table .= "</tr>";
            }
            mysqli_free_result($result);
            $table .= "</table>";
            echo $table;
        } else echo $notFind;
        mysqli_close($link);
    }

    if (isset($_GET['form3Btn'])) {

        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $user = 'root'; //имя пользователя, по умолчанию это root
        $password = 'usbw'; //пароль, по умолчанию пустой
        $db_name = 'test'; //имя базы данных

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

        $table = 'sale';
        $num = $_GET['name3'];
        $srch = $_GET['search3'];

        $result = mysqli_query($link, "SELECT*FROM " . $table . " WHERE " . $num . "='" . $srch . "'")
        or die(mysqli_error($link));
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            $table = "<table>";
            $table .= "<caption>ПРОДАЖА</caption>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Количество</th>";
            $table .= "<th>Дата продажи</th>";
            $table .= "<th>E-mail</th>";
            $table .= "</tr>";

            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                $table .= "<tr>";
                for ($j = 1; $j < 5; ++$j) $table .= "<td>$row[$j]</td>";
                $table .= "</tr>";
            }
            mysqli_free_result($result);
            $table .= "</table> ";
            echo $table;
        } else echo $notFind;
        mysqli_close($link);
    }
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