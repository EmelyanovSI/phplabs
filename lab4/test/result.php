<?php session_start(); ?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab4</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../styles/lab1.css">
    <link rel="stylesheet" href="../../styles/lab2.css">
    <link rel="stylesheet" href="../../styles/lab3.css">
    <link rel="stylesheet" href="../../styles/lab4.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
</head>

<body>
<header>
    <div class="divHeader">
        <a href="../../index.php"><img class="menuImg" src="../../images/greenBlockMenu.png" alt="menu img"></a>
        <div class="title">
            <span class="FIO">Emelyanov Sergey Igorevich</span>
            <span class="option">Option16</span>
        </div>
        <form id="searchBox" action="" method="get">
            <input id="searchText" type="search" name="searchText" placeholder="Search for labs!" autofocus>
            <button id="searchBtn" type="button" value="search"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <nav class="navHeader">
        <ul class="mainMenu">
            <li><a href="../../lab1/form1.php">Form</a></li>
            <li><a href="../../lab2/add.php">Text file</a></li>
            <li><a href="../../lab3/cookies.php">Cookies</a></li>
            <li class="active"><a href="../shop.php">Session</a></li>
            <li><a href="../../lab5/regular.html">Regular</a></li>
            <li><a href="../../lab6/lab6.php">Authorization</a></li>
            <li><a href="../../lab7/lab7.php">Database</a></li>
            <li><a href="../../lab8/lab8.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>TEST</p>
    <ul class="subMenu">
        <li><a href="../shop.php">ТОВАРЫ</a></li>
        <li><a href="../bin.php">КОРЗИНА</a></li>
        <li><a href="../utils.php">ВРЕМЯ СЧЕТЧИК EMAIL</a></li>
        <li><a href="../form1.php">ФОРМЫ</a></li>
        <li><a href="../logout.php">РАЗРУШИТЬ СЕССИЮ</a></li>
        <li class="active2"><a href="1.php">ТЕСТ</a></li>
    </ul>
</nav>

<main>

    <?php
    $score = -1;
    if (isset($_GET['new']) && ($_GET['new'] == 'yes')) {
        $score = 0;
        if (isset($_SESSION['test'])) {
            if (isset($_SESSION['test']['first'])) {
                if ($_SESSION['test']['first'] == 1) ++$score;
            }
            if (isset($_SESSION['test']['second'])) {
                if ($_SESSION['test']['second'] == 1) ++$score;
            }
            if (isset($_SESSION['test']['third'])) {
                if ($_SESSION['test']['third'] == Array(4 => '4', 5 => '5')) ++$score;
            }
            if (isset($_SESSION['test']['fourth'])) {
                if ($_SESSION['test']['fourth'] == 2) ++$score;
            }
            if (isset($_SESSION['test']['fifth'])) {
                if ($_SESSION['test']['fifth'] == Array(4 => '4')) ++$score;
            }
            if (isset($_SESSION['test']['sixth'])) {
                if ($_SESSION['test']['sixth'] == 4) ++$score;
            }
            if (isset($_SESSION['test']['seventh'])) {
                if ($_SESSION['test']['seventh'] == 0) ++$score;
            }
            if (isset($_SESSION['test']['eighth'])) {
                if ($_SESSION['test']['eighth'] == 2) ++$score;
            }
            if (isset($_SESSION['test']['ninth'])) {
                if ($_SESSION['test']['ninth'] == '0123456789') ++$score;
            }
            if (isset($_SESSION['test']['tenth'])) {
                if ($_SESSION['test']['tenth'] == 2) ++$score;
            }
            echo '<p class="added">Баллов: ' . $score . '/10</p>';
            unset ($_SESSION['test']);
        } else {
            echo '<p class="notFind">Ошибка подсчета результатов текущего теста!</p>';
            $score = -1;
        }
    }

    if (isset($_SESSION['testResult'])) {
        echo '<p class="searchP swing">Предыдущие результаты</p>';
        $table = "<table>";
        $table .= "<tr>
			        <th>#</th>
			        <th>Результат</th>
			       </tr>";
        $n = 0;
        foreach ($_SESSION['testResult'] as $res => $val) {
            $table .= "<tr>";
            $table .= "<td>" . ++$n . "</td>";
            $table .= "<td>" . $val . "/10</td>";
            $table .= "</tr>";
        }
        $table .= "</table> ";
        echo $table;
    } else echo '<p class="notFind">Нет предыдущих результатов!</p>';

    if (isset($_GET['new']) && ($_GET['new'] == 'yes') && $score != -1) {
        date_default_timezone_set("UTC");
        $now = time();
        $_SESSION['testResult'][$now] = $score;
        unset($_GET['new']);
    }
    ?>

    <div class="npBtn">
        <a href="1.php">Пройти заново</a>
    </div>

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

<script src="../../scripts/main.js" type="text/javascript" language="JavaScript"></script>
<script src="../../scripts/jquery-3.4.0.js" type="text/javascript" language="JavaScript"></script>
<script src="../../scripts/navigation.js" type="text/javascript" language="JavaScript"></script>

</body>

</html>
