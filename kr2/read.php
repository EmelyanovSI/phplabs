<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpKr2</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <p class="title">Emelyanov Sergey Igorevich</p>
    <nav>
        <ul class="mainMenu">
            <li><a href="add.php">Ввод данных</a></li>
            <li class="active"><a href="read.php">Чтение данных</a></li>
            <li><a href="sort.php">Сортировка по фамилии</a></li>
            <li><a href="search.php">Поиск по номеру</a></li>
        </ul>
    </nav>
</header>

<main>


    <?php

    $host = 'localhost';
    $user = 'root';
    $password = 'usbw';
    $db_name = 'test';

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_set_charset($link, 'utf8');

    $table = 'hotel';
    $result = mysqli_query($link, "SELECT*FROM " . $table . " WHERE id > 0") or die(mysqli_error($link));

    $table = "<table>";
    $table .= "<caption>База данных</caption>";
    $table .= "<tr>";
    $table .= "<th>Фамилия, имя</th>";
    $table .= "<th>Оплата и документы</th>";
    $table .= "<th>Номер</th>";
    $table .= "<th>Удобства в номере</th>";
    $table .= "<th>Пол</th>";
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

</body>
</html>
