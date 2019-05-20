<?php
session_start();
if (isset($_SESSION['utils']['refresh'])) {
    $_SESSION['utils']['refresh']++;
} else {
    $_SESSION['utils']['refresh'] = 0;
}
if (!isset($_SESSION['utils']['date']))
    $_SESSION['utils']['date'] = time();
if (isset($_GET['Email']))
    $_SESSION['Email'] = $_GET['Email'];
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab4</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
    <link rel="stylesheet" href="../styles/lab3.css">
    <link rel="stylesheet" href="../styles/lab4.css">
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
    </div>
    <nav class="navHeader">
        <ul class="mainMenu">
            <li><a href="../lab1/form1.php">Form</a></li>
            <li><a href="../lab2/add.php">Text file</a></li>
            <li><a href="../lab3/cookies.php">Cookies</a></li>
            <li class="active"><a href="shop.php">Session</a></li>
            <li><a href="../lab5/regular.html">Regular</a></li>
            <li><a href="../lab6/add.php">Authorization</a></li>
            <li><a href="../lab7/add.php">Database</a></li>
            <li><a href="../lab8/add.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>СЕССИИ: Время прибывания, счетчик обновлений, email</p>
    <ul class="subMenu">
        <li><a href="shop.php">ТОВАРЫ</a></li>
        <li><a href="bin.php">КОРЗИНА</a></li>
        <li class="active2"><a href="utils.php">ВРЕМЯ СЧЕТЧИК EMAIL</a></li>
        <li><a href="form1.php">ФОРМЫ</a></li>
        <li><a href="logout.php">РАЗРУШИТЬ СЕССИЮ</a></li>
        <li><a href="test/1.php">ТЕСТ</a></li>
    </ul>
</nav>

<main>

    <?php
    if (isset($_SESSION['utils'])) {
        if ($_SESSION['utils']['refresh'] != 0) {
            echo '<p class="added">Вы обновили страницу ' . $_SESSION['utils']['refresh'] . ' раз(а).</p>';
            date_default_timezone_set("UTC");
            try {
                $dd = (new DateTime())->setTimestamp($_SESSION['utils']['date']);
            } catch (Exception $e) {
            }
            try {
                $now = new DateTime();
            } catch (Exception $e) {
            }
            $d = date_diff($now, $dd);
            $dif = $d->s + $d->i * 60;
            echo '<p class="added">Вы зашли на сайт ' . $dif . ' секунд(ы) назад.';
        } else echo '<p class="notFind">Вы еще не обновляли страницу!</p>';
    }
    ?>

    <div class="forms">
        <form>
            <fieldset>
                <legend>NEED TO REMEMBER</legend>
                <label for="Email">Email</label>
                <input name="Email" type="text" placeholder="Email" required
                       pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}">
            </fieldset>
            <input type="submit" value="Запомнить">
        </form>

        <form>
            <fieldset>
                <legend>MAGIC</legend>

                <label for="name">Имя</label>
                <input name="name" type="text" placeholder="Имя" required
                       pattern="^[A-ZА-ЯЁ][a-zA-Zа-яА-ЯЁ\s]*$">

                <label for="family">Фамилия</label>
                <input name="family" type="text" placeholder="Фамилия" required
                       pattern="^[A-ZА-ЯЁ][a-zA-Zа-яА-ЯЁ\s]*$">

                <label for="password">Пароль</label>
                <input name="password" type="password" placeholder="****" required
                       pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">

                <label for="magicEmail">Email</label>
                <input name="magicEmail" type="text" placeholder="Email"
                       pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}"
                       value='<?php
                       if (isset($_SESSION['Email']))
                           echo '' . $_SESSION['Email'];
                       else echo '' ?>'
                       required>
            </fieldset>
            <input type="submit" value="Отправить">
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
