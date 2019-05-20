<?php
session_start();
$shoes['Туфли'] = '';
$number1 = '';
$date1 = '';
$email1 = '';
if (!empty($_GET)) {
    $_SESSION['form3']['shoes'] = $_GET['shoes'];
    $_SESSION['form3']['number1'] = $_GET['number1'];
    $_SESSION['form3']['date1'] = $_GET['date1'];
    $_SESSION['form3']['email1'] = $_GET['email1'];
}
if (isset($_SESSION['form3'])) {
    $shoes = $_SESSION['form3']['shoes'];
    $number1 = $_SESSION['form3']['number1'];
    $date1 = $_SESSION['form3']['date1'];
    $email1 = $_SESSION['form3']['email1'];
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
            <li><a href="../lab7/add.php">Database</a></li>
            <li><a href="../lab8/add.php">Registration and database</a></li>
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
        <form name="form3">
            <fieldset>
                <legend>ПРОДАЖА</legend>

                <label for="name1">Наименование</label>
                <div id="name1">
                    <input type="checkbox" name="shoes[Туфли]" value="Туфли"
                           title="Туфли" <?php if (isset($shoes['Туфли'])) echo 'checked'; ?>>
                    <input type="checkbox" name="shoes[Кроссовки]" value="Кроссовки"
                           title="Кроссовки" <?php if (isset($shoes['Кроссовки'])) echo 'checked'; ?>>
                    <input type="checkbox" name="shoes[Тапки]" value="Тапки"
                           title="Тапки" <?php if (isset($shoes['Тапки'])) echo 'checked'; ?>>
                    <input type="checkbox" name="shoes[Ботинки]" value="Ботинки"
                           title="Ботинки" <?php if (isset($shoes['Ботинки'])) echo 'checked'; ?>>
                    <input type="checkbox" name="shoes[Кроксы]" value="Кроксы"
                           title="Кроксы" <?php if (isset($shoes['Кроксы'])) echo 'checked'; ?>>
                    <input type="checkbox" name="shoes[Шлепки]" value="Шлепки"
                           title="Шлепки" <?php if (isset($shoes['Шлепки'])) echo 'checked'; ?>>
                </div>

                <label for="number1">Количество</label>
                <div id="number1">
                    <input type="radio" name="number1" value="1"
                           title="1" <?php if ($number1 == '1') echo 'checked'; ?>>
                    <input type="radio" name="number1" value="2"
                           title="2" <?php if ($number1 == '2') echo 'checked'; ?>>
                    <input type="radio" name="number1" value="3"
                           title="3" <?php if ($number1 == '3') echo 'checked'; ?>>
                    <input type="radio" name="number1" value="4"
                           title="4" <?php if ($number1 == '4') echo 'checked'; ?>>
                    <input type="radio" name="number1" value="5"
                           title="5" <?php if ($number1 == '5') echo 'checked'; ?>>
                    <input type="radio" name="number1" value="6"
                           title="6" <?php if ($number1 == '6') echo 'checked'; ?>>
                </div>

                <label for="date1">Дата продажи</label>
                <input id="date1" name="date1" type="date" placeholder="2000-03-29" value="<?php echo $date1; ?>"
                       min="1970-01-01" max="2070-01-01"
                       pattern="\d{1,2}/\d{1,2}/\d{4}">

                <label for="email1">E-mail</label>
                <input id="email1" name="email1" type="email"
                       value="<?php echo $email1; ?>" placeholder="emelyanov@gmail.com"
                       pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}">

                <input id="form3request" name="form3request" type="hidden" value="form3request">

            </fieldset>
            <input type="submit" value="Отправить">
            <input type="reset" value="Очистить">
        </form>
    </div>

    <div class="npBtn">
        <a href="form2.php">Preview</a>
        <a>Next</a>
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
