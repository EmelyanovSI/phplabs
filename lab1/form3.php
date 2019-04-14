<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab1</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
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
        <form id="searchBox" action="result.php" method="get">
            <input id="searchText" type="search" name="searchText" placeholder="Search for labs!" autofocus>
            <button id="searchBtn" type="submit" value="search"><i class="fas fa-search"></i></button>
            <input id="search" name="search" type="hidden" value="search">
        </form>
    </div>
    <nav class="navHeader">
        <ul class="mainMenu">
            <li class="active"><a href="form1.php">Form</a></li>
            <li><a href="../lab2/add.php">Text file</a></li>
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
        <li><a href="form1.php">АССОРТИМЕНТ</a></li>
        <li><a href="form2.php">ПОСТУПЛЕНИЕ</a></li>
        <li class="active2"><a href="form3.php">ПРОДАЖА</a></li>
        <li><a href="result.php">РЕЗУЛЬТАТ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form1" action="result.php" method="get">
            <fieldset>
                <legend>ПРОДАЖА ( РЕЗУЛЬТАТ )</legend>

                <label for="name1">Наименование</label>
                <div id="name1">
                    <input type="checkbox" name="shoes['Туфли']" value="Туфли" title="Туфли">
                    <input type="checkbox" name="shoes['Кроссовки']" value="Кроссовки" title="Кроссовки">
                    <input type="checkbox" name="shoes['Тапки']" value="Тапки" title="Тапки">
                    <input type="checkbox" name="shoes['Ботинки']" value="Ботинки" title="Ботинки">
                    <input type="checkbox" name="shoes['Кроксы']" value="Кроксы" title="Кроксы" checked>
                    <input type="checkbox" name="shoes['Шлепки']" value="Шлепки" title="Шлепки">
                </div>

                <label for="number1">Количество</label>
                <div id="number1">
                    <input type="radio" name="number[]" value="1" title="1" checked>
                    <input type="radio" name="number[]" value="2" title="2">
                    <input type="radio" name="number[]" value="3" title="3">
                    <input type="radio" name="number[]" value="4" title="4">
                    <input type="radio" name="number[]" value="5" title="5">
                    <input type="radio" name="number[]" value="6" title="6">
                </div>

                <label for="date1">Дата продажи</label>
                <input id="date1" name="date1" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01">

                <label for="email1">E-mail</label>
                <input id="email1" name="email1" type="email"
                       value="emelyanov@gmail.com" placeholder="emelyanov@gmail.com">

                <input id="form3request" name="form3request" type="hidden" value="form3request">

            </fieldset>
            <input type="submit" value="Отправить">
            <input type="reset" value="Очистить">
        </form>

        <form name="form2" action="form3.php" method="get">
            <fieldset>
                <legend>ПРОДАЖА</legend>

                <label for="name2">Наименование</label>
                <div id="name2">
                    <input type="checkbox" name="shoes['Туфли']" value="Туфли" title="Туфли">
                    <input type="checkbox" name="shoes['Кроссовки']" value="Кроссовки" title="Кроссовки">
                    <input type="checkbox" name="shoes['Тапки']" value="Тапки" title="Тапки">
                    <input type="checkbox" name="shoes['Ботинки']" value="Ботинки" title="Ботинки">
                    <input type="checkbox" name="shoes['Кроксы']" value="Кроксы" title="Кроксы" checked>
                    <input type="checkbox" name="shoes['Шлепки']" value="Шлепки" title="Шлепки">
                </div>

                <label for="number2">Количество</label>
                <div id="number2">
                    <input type="radio" name="number[]" value="1" title="1" checked>
                    <input type="radio" name="number[]" value="2" title="2">
                    <input type="radio" name="number[]" value="3" title="3">
                    <input type="radio" name="number[]" value="4" title="4">
                    <input type="radio" name="number[]" value="5" title="5">
                    <input type="radio" name="number[]" value="6" title="6">
                </div>

                <label for="date2">Дата продажи</label>
                <input id="date2" name="date2" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01">

                <label for="email2">E-mail</label>
                <input id="email2" name="email2" type="email"
                       value="emelyanov@gmail.com" placeholder="emelyanov@gmail.com">

            </fieldset>
            <input type="submit" value="Отправить">
            <input type="reset" value="Очистить">
        </form>
    </div>

    <?php
    if (!empty($_GET)) {
        $shoes = "";
        $number = "";
        foreach ($_GET['shoes'] as $value)
            $shoes .= $value . "<br>";
        foreach ($_GET['number'] as $value)
            $number .= $value . "<br>";
        $table = "<table>";
        $table .= "<tr>";
        $table .= "<th>Наименование</th>";
        $table .= "<th>Количество</th>";
        $table .= "<th>Дата продажи</th>";
        $table .= "<th>E-mail</th>";
        $table .= "</tr>";
        $table .= "<tr>";
        $table .= "<td>" . $shoes . "</td>";
        $table .= "<td>" . $number . "</td>";
        $table .= "<td>" . $_GET['date2'] . "</td>";
        $table .= "<td>" . $_GET['email2'] . "</td>";
        $table .= "</tr>";
        $table .= "</table>";
        echo $table;
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

<script src="../scripts/main.js" type="text/javascript" language="JavaScript"></script>
<script src="../scripts/jquery-3.4.0.js" type="text/javascript" language="JavaScript"></script>
<script src="../scripts/navigation.js" type="text/javascript" language="JavaScript"></script>

</body>

</html>