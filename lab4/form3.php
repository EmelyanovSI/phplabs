

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
            <li class="active"><a href="shop.php">Sessions</a></li>
            <li><a href="#">Regulars</a></li>
            <li><a href="#">Authorization</a></li>
            <li><a href="#">Database</a></li>
            <li><a href="#">Registration and database</a></li>
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
        <li><a href="#">СБРОС ФОРМЫ</a></li>
        <li><a href="#">ТЕСТ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form1">
            <fieldset>
                <legend>ПРОДАЖА</legend>

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
<script>
    showPrice();
</script>

</body>

</html>
