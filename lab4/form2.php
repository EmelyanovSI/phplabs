<?php
session_start();
$name1 = '';
$number1 = '';
$date1 = '';
$tel1 = '';
if (!empty($_GET)) {
    $_SESSION['form2']['name1'] = $_GET['name1'];
    $_SESSION['form2']['number1'] = $_GET['number1'];
    $_SESSION['form2']['date1'] = $_GET['date1'];
    $_SESSION['form2']['tel1'] = $_GET['tel1'];
}
if (isset($_SESSION['form2'])) {
    $name1 = $_SESSION['form2']['name1'];
    $number1 = $_SESSION['form2']['number1'];
    $date1 = $_SESSION['form2']['date1'];
    $tel1 = $_SESSION['form2']['tel1'];
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
        <form name="form2">
            <fieldset>
                <legend>ПОСТУПЛЕНИЕ</legend>

                <label for="name1">Наименование</label>
                <select id="name1" name="name1">
                    <option <?php if ($name1 == 'Туфли') echo 'selected'; ?>>Туфли</option>
                    <option <?php if ($name1 == 'Кроссовки') echo 'selected'; ?>>Кроссовки</option>
                    <option <?php if ($name1 == 'Тапки') echo 'selected'; ?>>Тапки</option>
                    <option <?php if ($name1 == 'Ботинки') echo 'selected'; ?>>Ботинки</option>
                    <option <?php if ($name1 == 'Кроксы') echo 'selected'; ?>>Кроксы</option>
                    <option <?php if ($name1 == 'Шлепки') echo 'selected'; ?>>Шлепки</option>
                </select>

                <label for="number1">Количество</label>
                <input id="number1" name="number1" type="number" min="1" max="100" value="<?php echo $number1; ?>"
                       pattern="[0-9]{3}">

                <label for="date1">Дата поступления</label>
                <input id="date1" name="date1" type="date" placeholder="2000-03-29" value="<?php echo $date1; ?>"
                       min="1970-01-01" max="2070-01-01"
                       pattern="\d{1,2}/\d{1,2}/\d{4}">

                <label for="tel1">Номер телефона</label>
                <input id="tel1" name="tel1" type="tel" placeholder="+999-(99)-999-99-99" value="<?php echo $tel1; ?>"
                       pattern="^((80|\+375)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$">

                <input id="form2request" name="form2request" type="hidden" value="form2request">

            </fieldset>
            <input type="submit" value="Отправить">
            <input type="reset" value="Очистить">
        </form>
    </div>

    <div class="npBtn">
        <a href="form1.php">Preview</a>
        <a href="form3.php">Next</a>
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
