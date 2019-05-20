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
            <li><a href="../lab2/add.php">Text file</a></li>
            <li><a href="../lab3/cookies.php">Cookies</a></li>
            <li><a href="../lab4/shop.php">Session</a></li>
            <li><a href="../lab5/regular.html">Regular</a></li>
            <li><a href="../lab6/add.php">Authorization</a></li>
            <li class="active"><a href="add.php">Database</a></li>
            <li><a href="../lab8/add.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>Учет продаж в обувном магазине</p>
    <ul class="subMenu">
        <li><a href="add.php">ДОБАВИТЬ ДАННЫЕ</a></li>
        <li><a href="view.php">ПРОСМОТР ДАННЫХ</a></li>
        <li><a href="sorting.php">СОРТИРОВКА ДАННЫХ</a></li>
        <li><a href="search.php">ПОИСК ДАННЫХ</a></li>
        <li class="active2"><a href="sql.php">ЗАПРОСЫ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form" action="sql.php" method="get">
            <fieldset>
                <legend>Запросы</legend>

                <label for="sql">Запросы</label>
                <select id="sql" name="sql">
                    <option value="SELECT * FROM receipt WHERE name2 = 'Шлепки' LIMIT 1">Шлепки</option>
                    <option value="SELECT shoes, COUNT(id) AS kol FROM sale GROUP BY number">Заказано</option>
                    <option value="SELECT * FROM rang WHERE price1 BETWEEN 4000 AND 5000">Цена от 4000 до 5000</option>
                    <option value="SELECT name2, COUNT(id) FROM receipt GROUP BY number2 HAVING COUNT(id) > 0">В наличии</option>
                    <option value="SELECT * FROM receipt WHERE tel2 LIKE '80%'">Телефон с 80...</option>
                    <option value="SELECT * FROM sale ORDER BY number">Продажа по количеству</option>
                    <option value="SELECT * FROM receipt WHERE date2 IN ('2019-03-17')">Состояние на 2019-03-17</option>
                    <option value="SELECT MAX(price1) FROM rang">Максимальная цена</option>
                    <option value="SELECT MIN(price1) FROM rang">Минимальная цена</option>
                    <option value="UPDATE rang SET price1 = price1 * 1.1">Поднять цену на 10%</option>
                </select>
            </fieldset>
            <input type="submit" value="Выполнить" name="submit">
        </form>
    </div>

    <?php
    if (!empty($_GET) and isset($_GET['sql'])) {

        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $user = 'root'; //имя пользователя, по умолчанию это root
        $password = 'usbw'; //пароль, по умолчанию пустой
        $db_name = 'test'; //имя базы данных

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

        $query = $_GET['sql'];
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        if ($query != 'UPDATE rang SET price1 = price1 * 1.1') {
            $table = "<table>";
            $table .= "<caption>Результат</caption>";
            $rows = mysqli_num_rows($result);
            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                $table .= "<tr>";
                for ($j = 0; $j < count($row); ++$j) $table .= "<td>$row[$j]</td>";
                $table .= "</tr>";
            }
            mysqli_free_result($result);
            $table .= "</table>";
            echo $table;
        }
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
