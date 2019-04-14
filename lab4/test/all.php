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
            <li class="active"><a href="../shop.php">Sessions</a></li>
            <li><a href="../../lab5/lab5.php">Regulars</a></li>
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
    /*$AnswerTitle = array(
        array('1'),
        array('три', 'False', 'четыре', 'Возникнет ошибка выполнения'),
        array('значения выбранных переключателей в группе переключателей',
            'одностроное поле',
            'выбранные значения из списка со множественным выбором',
            'выбранные значения из списка с единственным выбором',
            'значений выбранной радиокнопки в группе радиокнопок'),
        array('дa', 'нет'),
        array('is_object($a)', 'settype($a,”integer”)', 'is_integer($a)', 'is_int($a)'),
        array('4', 'этот код выдаст ошибку', '6', '5'),
        array('0'),
        array('GET', 'POST'),
        array('0123456789'),
        array('перехода на следующую итерацию цикла',
            'завершения работы цикла Верно',
            'завершения работы программы',
            'выхода из функции'));*/

    $arr = array('first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth');
    $table = "<table>";
    $table .= "<tr>
                <th>Вопрос</th>
			    <th>Ответ</th>
			    <th>Перейти к вопросу</th>
			   </tr>";
    for ($i = 0; $i < 10; $i++) {
        $table .= "<tr>";
        $table .= "<td>" . ($i + 1) . "</td>";
        $Answer = 'Нет ответа';
        if (isset($_SESSION['test'][$arr[$i]]))
            $Answer = $_SESSION['test'][$arr[$i]];
        if (is_array($Answer))
            $Answer = implode(";", $Answer);
        $table .= "<td>" . $Answer . "</td>";
        $table .= "<td class='swing'><a href='" . ($i + 1) . ".php'>" . $arr[$i] . "</a></td>";
        $table .= "</tr>";
    }
    $table .= "</table> ";
    echo $table;
    ?>

    <div class="npBtn">
        <a href="result.php?new=yes">Завершить просмотр</a>
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
