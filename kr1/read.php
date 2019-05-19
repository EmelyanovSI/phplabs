<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpKr1</title>
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
            <li><a href="search.php">Поиск по стране</a></li>
        </ul>
    </nav>
</header>

<main>

    <?php
    $form = fopen("data.txt", 'r') or die("<p class='notFind'>Не удалось открыть файл!</p>");
    $table = "<table>";
    $table .= "<caption>База данных</caption>";
    $table .= "<tr>";
    $table .= "<th>ФИО</th>";
    $table .= "<th>Документы</th>";
    $table .= "<th>Страна</th>";
    $table .= "<th>Удобства</th>";
    $table .= "<th>Продолжительность</th>";
    $table .= "</tr>";

    while (!feof($form)) {
        $str = htmlentities(fgets($form));
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
    fclose($form);
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
