<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpKr1</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

<header>
    <p class="title">Emelyanov Sergey Igorevich</p>
    <nav>
        <ul class="mainMenu">
            <li><a href="add.php">Ввод данных</a></li>
            <li><a href="read.php">Чтение данных</a></li>
            <li class="active"><a href="sort.php">Сортировка по фамилии</a></li>
            <li><a href="search.php">Поиск по стране</a></li>
        </ul>
    </nav>
</header>

<main>

    <?php
    $notOpen = "<p class='notFind'>Не удалось открыть файл!</p>";

    $form = fopen("data.txt", 'r') or die($notOpen);

    function cmp($a, $b)
    {
        if ($a[0] == $b[0]) return 0;
        return $a[0] > $b[0] ? 1 : -1;
    }

    $i = 0;
    while (!feof($form)) {
        $str = htmlentities(fgets($form));
        if (!empty($str))
            $mas[$i++] = explode(";", $str);
    }
    fclose($form);

    usort($mas, 'cmp');

    $table = "<table>";
    $table .= "<caption>База данных</caption>";
    $table .= "<tr>";
    $table .= "<th>ФИО</th>";
    $table .= "<th>Документы</th>";
    $table .= "<th>Страна</th>";
    $table .= "<th>Удобства</th>";
    $table .= "<th>Продолжительность</th>";
    $table .= "</tr>";

    foreach ($mas as $a) {
        $table .= "<tr>";
        $table .= "<td>" . $a[0] . "</td>";
        $table .= "<td>" . $a[1] . "</td>";
        $table .= "<td>" . $a[2] . "</td>";
        $table .= "<td>" . $a[3] . "</td>";
        $table .= "<td>" . $a[4] . "</td>";
        $table .= "</tr>";
    }
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

<script src="scripts/jquery-3.4.0.js" type="text/javascript" language="JavaScript"></script>
<script src="scripts/script.js" type="text/javascript" language="JavaScript"></script>

</body>
</html>
