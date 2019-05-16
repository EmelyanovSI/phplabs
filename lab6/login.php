<?php

function user_exists()
{
    $authfile = fopen('auth.txt', 'r');
    while (!feof($authfile)) {
        $entry = fgets($authfile);
        if (!empty($entry)) {
            $attr = explode(';', $entry);
            $login = $attr[0];
            $password = $attr[2];
            if ($login == $_POST['login'] and md5($_POST['password']) == $password) {
                fclose($authfile);
                return $attr[3];
            }
        }
    }
    fclose($authfile);
    return -1;
}


$logError = true;
if (!empty($_POST)) {
    $logRes = user_exists();
    if ($logRes != -1) {
        $logError = false;
        session_start();
        $_SESSION['auth']['success'] = true;
        $_SESSION['auth']['login'] = $_POST['login'];
        $_SESSION['auth']['rights'] = $logRes;
        header("Location: http://localhost:63342/phplabs/lab6/add.php");
        exit;
    } else $logError = true;
}
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab6</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
    <link rel="stylesheet" href="../styles/lab3.css">
    <link rel="stylesheet" href="../styles/lab4.css">
    <link rel="stylesheet" href="../styles/lab6.css">
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
            <button id="searchBtn" type="button" value="search"><i class="fas fa-search"></i></button>
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
            <li class="active"><a href="add.php">Authorization</a></li>
            <li><a href="../lab7/add.php">Database</a></li>
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

    <div class="forms">
        <form name="logForm" action="loginScript.php" method="POST">
            <?php
            if (!empty($_POST) and $logError) echo '<p class="notFind">Неверный логин и/или пароль!</p>';
            ?>
            <fieldset>
                <legend>Войти на сайт</legend>

                <label for="login">Логин</label>
                <input type="text" name="login" placeholder="login" required>

                <label for="password">Пароль №1</label>
                <input type="password" name="password" placeholder="password" required>
            </fieldset>

            <input type="submit" value="Войти">
            <input type="reset" value="Отмена">
        </form>
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

<script src="../scripts/main.js" type="text/javascript" language="JavaScript"></script>
<script src="../scripts/jquery-3.4.0.js" type="text/javascript" language="JavaScript"></script>
<script src="../scripts/navigation.js" type="text/javascript" language="JavaScript"></script>

</body>

</html>
