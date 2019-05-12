<?php
session_start();
$name1 = '';
$manufacturer1 = '';
$site1 = '';
$date1 = '';
$price1 = '';
if (!empty($_GET)) {
    $_SESSION['form1']['name1'] = $_GET['name1'];
    $_SESSION['form1']['manufacturer1'] = $_GET['manufacturer1'];
    $_SESSION['form1']['site1'] = $_GET['site1'];
    $_SESSION['form1']['date1'] = $_GET['date1'];
    $_SESSION['form1']['price1'] = $_GET['price1'];
}
if (isset($_SESSION['form1'])) {
    $name1 = $_SESSION['form1']['name1'];
    $manufacturer1 = $_SESSION['form1']['manufacturer1'];
    $site1 = $_SESSION['form1']['site1'];
    $date1 = $_SESSION['form1']['date1'];
    $price1 = $_SESSION['form1']['price1'];
}
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
            <li><a href="../lab7/lab7.php">Database</a></li>
            <li><a href="../lab8/lab8.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>Forms + Sessions</p>
    <ul class="subMenu">
        <li><a href="shop.php">ТОВАРЫ</a></li>
        <li><a href="bin.php">КОРЗИНА</a></li>
        <li><a href="utils.php">ВРЕМЯ СЧЕТЧИК EMAIL</a></li>
        <li class="active2"><a href="form1.php">ФОРМЫ</a></li>
        <li><a href="logout.php">РАЗРУШИТЬ СЕССИЮ</a></li>
        <li><a href="test/1.php">ТЕСТ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form1">
            <fieldset>
                <legend>АССОРТИМЕНТ</legend>

                <label for="name1">Наименование</label>
                <input id="name1" name="name1" type="text" placeholder="Туфли" value="<?php echo $name1; ?>" required
                       pattern="^[A-ZА-ЯЁ][a-zA-Zа-яА-ЯЁ\s]*$">

                <label for="manufacturerInput1">Производитель</label>
                <input id="manufacturerInput1" name="manufacturer1" type="text" placeholder="Лубутен"
                       value="<?php echo $manufacturer1; ?>" list="manufacturer1" required
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
                       placeholder="http://bukinshoes.ru" value="<?php echo $site1; ?>"
                       pattern="http://+[A-Za-z0-9.-]+\.[A-Za-z]{2,4}">

                <label for="date1">Дата выпуска</label>
                <input id="date1" name="date1" type="date" placeholder="2000-03-29" value="<?php echo $date1; ?>"
                       min="1970-01-01" max="2070-01-01"
                       pattern="\d{1,2}/\d{1,2}/\d{4}">

                <label for="price1">Цена</label>
                <input id="price1" name="price1" type="range" min="100" max="5000" step="100"
                       value="<?php echo $price1; ?>">
                <span id="showPrice1">1000</span>

                <input id="form1request" name="form1request" type="hidden" value="form1request">

            </fieldset>
            <input type="submit" value="Сохранить">
            <input type="reset" value="Очистить">
        </form>
    </div>

    <div class="npBtn">
        <a>Preview</a>
        <a href="form2.php">Next</a>
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
<script>
    showPrice();
</script>

</body>

</html>
