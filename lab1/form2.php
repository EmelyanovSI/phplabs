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
            <li><a href="../lab5/">Regulars</a></li>
            <li><a href="../lab6/">Authorization</a></li>
            <li><a href="../lab7/">Database</a></li>
            <li><a href="../lab8/">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>Учет продаж в обувном магазине</p>
    <ul class="subMenu">
        <li><a href="form1.php">АССОРТИМЕНТ</a></li>
        <li class="active2"><a href="form2.php">ПОСТУПЛЕНИЕ</a></li>
        <li><a href="form3.php">ПРОДАЖА</a></li>
        <li><a href="result.php">РЕЗУЛЬТАТ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form1" action="result.php" method="get">
            <fieldset>
                <legend>ПОСТУПЛЕНИЕ ( РЕЗУЛЬТАТ )</legend>

                <label for="name1">Наименование</label>
                <select id="name1" name="name1">
                    <option>Туфли</option>
                    <option>Кроссовки</option>
                    <option>Тапки</option>
                    <option>Ботинки</option>
                    <option>Кроксы</option>
                    <option>Шлепки</option>
                </select>

                <label for="number1">Количество</label>
                <input id="number1" name="number1" type="number" min="1" max="100" value="1">

                <label for="date1">Дата поступления</label>
                <input id="date1" name="date1" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01">

                <label for="tel1">Номер телефона</label>
                <input id="tel1" name="tel1" type="tel" placeholder="+999-(99)-999-99-99"
                       pattern="^((80|\+375)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$">

                <input id="form2request" name="form2request" type="hidden" value="form2request">

            </fieldset>
            <input type="submit" value="Отправить">
            <input type="reset" value="Очистить">
        </form>

        <form name="form2" action="form2.php" method="get">
            <fieldset>
                <legend>ПОСТУПЛЕНИЕ</legend>

                <label for="name2">Наименование</label>
                <select id="name2" name="name2">
                    <option>Туфли</option>
                    <option>Кроссовки</option>
                    <option>Тапки</option>
                    <option>Ботинки</option>
                    <option>Кроксы</option>
                    <option>Шлепки</option>
                </select>

                <label for="number2">Количество</label>
                <input id="number2" name="number2" type="number" min="1" max="100" value="1">

                <label for="date2">Дата поступления</label>
                <input id="date2" name="date2" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01">

                <label for="tel2">Номер телефона</label>
                <input id="tel2" name="tel2" type="tel" placeholder="+999-(99)-999-99-99"
                       pattern="^((80|\+375)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$">

            </fieldset>
            <input type="submit" value="Отправить">
            <input type="reset" value="Очистить">
        </form>
    </div>

    <?php
    if (!empty($_GET)) {
        $table = "<table>";
        $table .= "<tr>";
        $table .= "<th>Наименование</th>";
        $table .= "<th>Количество</th>";
        $table .= "<th>Дата поступления</th>";
        $table .= "<th>Номер телефона</th>";
        $table .= "</tr>";
        $table .= "<tr>";
        $table .= "<td>" . $_GET['name2'] . "</td>";
        $table .= "<td>" . $_GET['number2'] . "</td>";
        $table .= "<td>" . $_GET['date2'] . "</td>";
        $table .= "<td>" . $_GET['tel2'] . "</td>";
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