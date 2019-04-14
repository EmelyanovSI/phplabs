<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab2</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
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
            <li class="active"><a href="add.php">Text file</a></li>
            <li><a href="../lab3/cookies.php">Cookies</a></li>
            <li><a href="../lab4/shop.php">Sessions</a></li>
            <li><a href="../lab5/lab5.php">Regulars</a></li>
            <li><a href="../lab6/lab6.php">Authorization</a></li>
            <li><a href="../lab7/lab7.php">Database</a></li>
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
        <li><a href="search.php">ПОИСК ДАННЫХ</a></li>
    </ul>
</nav>

<main>

    <?php
    if (isset($_GET['form1Btn'])) {
        $form1File = fopen("range.txt", 'a') or die("Не удалось создать файл!");
        flock($form1File, LOCK_EX); //БЛОКИРОВКА ФАЙЛА

        $table = "";
        $table .= $_GET['name1'] . ";";
        $table .= $_GET['manufacturer1'] . ";";
        $table .= $_GET['site1'] . ";";
        $table .= $_GET['date1'] . ";";
        $table .= $_GET['price1'] . ";";
        $table .= PHP_EOL;

        fwrite($form1File, $table);
        flock($form1File, LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
        fclose($form1File);
    } elseif (isset($_GET['form2Btn'])) {
        $form2File = fopen("receipt.txt", 'a') or die("Не удалось создать файл!");
        flock($form2File, LOCK_EX); //БЛОКИРОВКА ФАЙЛА

        $table = "";
        $table .= $_GET['name2'] . ";";
        $table .= $_GET['number2'] . ";";
        $table .= $_GET['date2'] . ";";
        $table .= $_GET['tel2'] . ";";
        $table .= PHP_EOL;

        fwrite($form2File, $table);
        flock($form2File, LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
        fclose($form2File);
    } elseif (isset($_GET['form3Btn'])) {
        $form3File = fopen("sale.txt", 'a') or die("Не удалось создать файл!");
        flock($form3File, LOCK_EX); //БЛОКИРОВКА ФАЙЛА

        $table = "";

        $shoes = "";
        $i = 0;
        foreach ($_GET['shoes'] as $value) {
            if ($i == 0)
                $shoes .= $value;
            else
                $shoes .= ", " . $value;
            $i++;
        }

        $number = "";
        $i = 0;
        foreach ($_GET['number'] as $value) {
            if ($i == 0)
                $number .= $value;
            else
                $number .= ", " . $value;
            $i++;
        }

        $table .= $shoes . ";";
        $table .= $number . ";";
        $table .= $_GET['date3'] . ";";
        $table .= $_GET['email3'] . ";";
        $table .= PHP_EOL;

        fwrite($form3File, $table);
        flock($form3File, LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
        fclose($form3File);
    }
    echo "<p class='added swing'>Данные успешно добавлены!</p>";
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
