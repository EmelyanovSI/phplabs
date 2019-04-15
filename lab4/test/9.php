<?php
session_start();
$ninth = '';
if (!empty($_GET))
    $_SESSION['test']['ninth'] = $_GET['ninth'];
if (isset($_SESSION['test']['ninth']))
    $ninth = $_SESSION['test']['ninth'];
?>

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

    <div class="forms">
        <form name="test9">
            <fieldset>
                <legend>Вопрос №9</legend>

                <label for="ninth">
                    Запишите результат выполнения<br>
                    следующего кода:<br>
                    function Silly() {<br>
                    static $a=0;<br>
                    echo $a;<br>
                    $a++;<br>
                    }<br>
                    for($i=0; $i<10; $i++)<br>
                    Silly();
                </label>
                <input id="ninth" name="ninth" type="text" placeholder="0..9" value="<?php echo $ninth; ?>" required>

            </fieldset>
            <input type="submit" value="Сохранить">
            <input type="reset" value="Очистить">
        </form>
    </div>
    <div class="npBtn">
        <a href="8.php">Preview</a>
        <a href="10.php">Next</a>
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
