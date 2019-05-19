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
            <li><a href="read.php">Чтение данных</a></li>
            <li><a href="sort.php">Сортировка по фамилии</a></li>
            <li class="active"><a href="search.php">Поиск по стране</a></li>
        </ul>
    </nav>
</header>

<main>

    <div class="forms">
        <form name="form" action="" method="get">
            <fieldset>
                <legend>Страна</legend>

                <label for="country"></label>
                <input id="country" name="country" type="text" placeholder="Поиск...">
            </fieldset>
            <input type="submit" name="submit" value="Найти">
        </form>
    </div>

    <?php
    $notOpen = "<p class='notFind'>Не удалось открыть файл!</p>";
    $notFind = "<p class='notFind'>Ничего не найдено!</p>";

    if (isset($_GET['submit'])) {
        $formFile = fopen("data.txt", 'r') or die($notOpen);

        $i = 0;
        while (!feof($formFile)) {
            $str = htmlentities(fgets($formFile));
            if (!empty($str)) {
                $temp = explode(";", $str);
                if ($temp[2] == $_GET['country']) $mas[$i++] = $temp;
            }
        }
        fclose($formFile);

        $table = "<table>";
        $table .= "<caption>База данных</caption>";
        $table .= "<tr>";
        $table .= "<th>ФИО</th>";
        $table .= "<th>Документы</th>";
        $table .= "<th>Страна</th>";
        $table .= "<th>Удобства</th>";
        $table .= "<th>Продолжительность</th>";
        $table .= "</tr>";

        if ($i > 0) {
            foreach ($mas as $value) {
                $table .= "<tr>";
                $table .= "<td>" . $value[0] . "</td>";
                $table .= "<td>" . $value[1] . "</td>";
                $table .= "<td>" . $value[2] . "</td>";
                $table .= "<td>" . $value[3] . "</td>";
                $table .= "<td>" . $value[4] . "</td>";
                $table .= "</tr>";
            }
            $table .= "</table>";
            echo $table;
        } else echo $notFind;
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

</body>
</html>
