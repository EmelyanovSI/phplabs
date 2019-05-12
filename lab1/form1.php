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
            <li><a href="../lab4/shop.php">Session</a></li>
            <li><a href="../lab5/regular.html">Regular</a></li>
            <li><a href="../lab6/add.php">Authorization</a></li>
            <li><a href="../lab7/lab7.php">Database</a></li>
            <li><a href="../lab8/lab8.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>Учет продаж в обувном магазине</p>
    <ul class="subMenu">
        <li class="active2"><a href="form1.php">АССОРТИМЕНТ</a></li>
        <li><a href="form2.php">ПОСТУПЛЕНИЕ</a></li>
        <li><a href="form3.php">ПРОДАЖА</a></li>
        <li><a href="result.php">РЕЗУЛЬТАТ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form1" action="result.php" method="get">
            <fieldset>
                <legend>АССОРТИМЕНТ ( РЕЗУЛЬТАТ )</legend>

                <label for="name1">Наименование</label>
                <input id="name1" name="name1" type="text" placeholder="Туфли" required
                       pattern="^[A-ZА-ЯЁ][a-zA-Zа-яА-ЯЁ\s]*$">

                <label for="manufacturerInput1">Производитель</label>
                <input id="manufacturerInput1" name="manufacturer1" type="text" placeholder="Лубутен"
                       list="manufacturer1" required
                       pattern="^[A-ZА-ЯЁ][a-zA-Zа-яА-ЯЁ\s]*$">
                <datalist id="manufacturer1">
                    <option value="Nike" name=""></option>
                    <option value="Supreme" name=""></option>
                    <option value="Adidas" name=""></option>
                    <option value="Gucci" name=""></option>
                    <option value="Puma" name=""></option>
                </datalist>

                <label for="site1">Сайт</label>
                <input id="site1" name="site1" type="url"
                       placeholder="http://bukinshoes.ru" value="http://bukinshoes.ru"
                       pattern="http://+[A-Za-z0-9.-]+\.[A-Za-z]{2,4}">

                <label for="date1">Дата выпуска</label>
                <input id="date1" name="date1" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01"
                       pattern="\d{1,2}/\d{1,2}/\d{4}">

                <label for="price1">Цена</label>
                <input id="price1" name="price1" type="range" min="100" max="5000" step="100" value="1000">
                <span id="showPrice1">1000</span>

                <input id="form1request" name="form1request" type="hidden" value="form1request">

            </fieldset>
            <input type="submit" value="Отправить">
            <input type="reset" value="Очистить">
        </form>

        <form name="form2" action="form1.php" method="get">
            <fieldset>
                <legend>АССОРТИМЕНТ</legend>

                <label for="name2">Наименование</label>
                <input id="name2" name="name2" type="text" placeholder="Туфли" required
                       pattern="^[A-ZА-ЯЁ][a-zA-Zа-яА-ЯЁ\s]*$">

                <label for="manufacturerInput2">Производитель</label>
                <input id="manufacturerInput2" name="manufacturer2" type="text" placeholder="Лубутен"
                       list="manufacturer2" required
                       pattern="^[A-ZА-ЯЁ][a-zA-Zа-яА-ЯЁ\s]*$">
                <datalist id="manufacturer2">
                    <option value="Nike" name=""></option>
                    <option value="Supreme" name=""></option>
                    <option value="Adidas" name=""></option>
                    <option value="Gucci" name=""></option>
                    <option value="Puma" name=""></option>
                </datalist>

                <label for="site2">Сайт</label>
                <input id="site2" name="site2" type="url"
                       placeholder="http://bukinshoes.ru" value="http://bukinshoes.ru"
                       pattern="http://+[A-Za-z0-9.-]+\.[A-Za-z]{2,4}">

                <label for="date2">Дата выпуска</label>
                <input id="date2" name="date2" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01"
                       pattern="\d{1,2}/\d{1,2}/\d{4}">

                <label for="price2">Цена</label>
                <input id="price2" name="price2" type="range" min="100" max="5000" step="100" value="1000">
                <span id="showPrice2">1000</span>

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
        $table .= "<th>Производитель</th>";
        $table .= "<th>Сайт</th>";
        $table .= "<th>Дата выпуска</th>";
        $table .= "<th>Цена</th>";
        $table .= "</tr>";
        $table .= "<tr>";
        $table .= "<td>" . $_GET['name2'] . "</td>";
        $table .= "<td>" . $_GET['manufacturer2'] . "</td>";
        $table .= "<td>" . $_GET['site2'] . "</td>";
        $table .= "<td>" . $_GET['date2'] . "</td>";
        $table .= "<td>" . $_GET['price2'] . "</td>";
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
<script>
    showPrice();
</script>

</body>

</html>