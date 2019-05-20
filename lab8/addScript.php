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
            <li><a href="add.php">Registration and database</a></li>
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

        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $user = 'root'; //имя пользователя, по умолчанию это root
        $password = 'usbw'; //пароль, по умолчанию пустой
        $db_name = 'test'; //имя базы данных

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

        $name1 = $_GET['name1'];
        $manufacturer1 = $_GET['manufacturer1'];
        $number = $_GET['site1'];
        $date1 = $_GET['date1'];
        $price1 = $_GET['price1'];

        $query = "INSERT INTO rang VALUES(NULL, '$name1', '$manufacturer1', '$number', '$date1', '$price1')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);

    } elseif (isset($_GET['form2Btn'])) {

        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $user = 'root'; //имя пользователя, по умолчанию это root
        $password = 'usbw'; //пароль, по умолчанию пустой
        $db_name = 'test'; //имя базы данных

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

        $name2 = $_GET['name2'];
        $number2 = $_GET['number2'];
        $date2 = $_GET['date2'];
        $tel2 = $_GET['tel2'];

        $query = "INSERT INTO receipt VALUES(NULL, '$name2', '$number2', '$date2', '$tel2')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);

    } elseif (isset($_GET['form3Btn'])) {

        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $user = 'root'; //имя пользователя, по умолчанию это root
        $password = 'usbw'; //пароль, по умолчанию пустой
        $db_name = 'test'; //имя базы данных

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

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

        $date3 = $_GET['date3'];
        $email3 = $_GET['email3'];

        $query = "INSERT INTO sale VALUES(NULL, '$shoes', '$number', '$date3', '$email3')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);

    }
    echo "<p class='added swing'>Данные успешно добавлены!</p><a class='viewBtn' href='view.php'>Просмотреть</a>";
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
