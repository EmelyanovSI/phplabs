<?php
$pStart = "<p class='added'>";
$pEnd = "</p>";
$visitsKol = "Вы посетили наш сайт ";
$times = " раз(а)!";
$visitsTime = "Вы не были на сайте ";
$never = "вообще никогда.";
$minutes = " мин.";
$timeToBirthday = "До Дня Рождения ";
$days = " дн.";
$happyBirthday = " С праздником!";

date_default_timezone_set("UTC");
$visitsCount = isset($_COOKIE['count']) ? (int)$_COOKIE['count'] : 0;

if (!isset($_POST['date']) && !isset($_POST['hiddenBtn']))
    setcookie('count', $visitsCount + 1, time() + 60 * 60 * 24 * 7);

$attend = isset($_COOKIE['attend']) ? $_COOKIE['attend'] : -1;
setcookie('attend', time(), time() + 60 * 60 * 24 * 7);

if (isset($_POST['hiddenBtn'])) {
    setcookie('hiddenBtn', "hide", time() + 60 * 2);
    header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit;
}

if (isset($_POST['date'])) {
    setcookie('date', strtotime($_POST['date']), time() + 60 * 60 * 24 * 7);
    header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit;
}

if (isset($_POST['theme'])) {
    setcookie('theme', $_POST['theme'], time() + 60 * 2);
    header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit;
}

/* Second part */

if (!isset($_COOKIE['hiddenBtn'])) $hiddenBanner =
    '<form class="added" method="POST">
        <p>Текстовый баннер с информацией!</p>
        <input type="submit" value="Не показывать больше!" name="hiddenBtn"/>
	</form>';

if ($attend == -1) {
    $timeResult = $pStart . $visitsTime . $never . $pEnd;
} else {
    try {
        $dd = (new DateTime())->setTimestamp($attend);
    } catch (Exception $e) {
    }
    try {
        $now = new DateTime();
    } catch (Exception $e) {
    }
    $difference = date_diff($now, $dd)->i;
    $timeResult = $pStart . $visitsTime . $difference . $minutes . $pEnd;
}

if (isset($_COOKIE['date'])) {
    $birthday = $pStart . $timeToBirthday;
    $brt = $_COOKIE['date'];
    try {
        $dt = (new DateTime())->setTimestamp($brt);
    } catch (Exception $e) {
    }
    try {
        $dt->setDate((new DateTime())->format('Y'), $dt->format('m'), $dt->format('d'));
    } catch (Exception $e) {
    }
    $dt->setTime(0, 0);
    try {
        $now = new DateTime();
    } catch (Exception $e) {
    }
    $now->setTime(0, 0);
    $different = date_diff($now, $dt)->days;
    $birthday .= $different . $days;
    if ($different == 0) $birthday .= $happyBirthday;

    $birthday .= $pEnd;
} else $birthday = "";

if (isset($_COOKIE['theme'])) {
    if ($_COOKIE['theme'] == 'Green')
        $style = "";
    elseif ($_COOKIE['theme'] == 'Yellow')
        $style = "../styles/lab3yellow.css";
    elseif ($_COOKIE['theme'] == 'Red')
        $style = "../styles/lab3red.css";
    elseif ($_COOKIE['theme'] == 'Reggy')
        $style = "../styles/lab3reggy.css";
    else
        $style = "";
}

?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab3</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
    <link rel="stylesheet" href="../styles/lab3.css">
    <link rel="stylesheet" href=<?php echo $style ?>>
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
            <li class="active"><a href="cookies.php">Cookies</a></li>
            <li><a href="../lab4/shop.php">Sessions</a></li>
            <li><a href="../lab5/lab5.php">Regulars</a></li>
            <li><a href="../lab6/lab6.php">Authorization</a></li>
            <li><a href="../lab7/lab7.php">Database</a></li>
            <li><a href="../lab8/lab8.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p class="mainP"><a href="cookies.php">Cookies</a></p>
</nav>

<main>

    <?php
    echo $pStart . $visitsKol . $visitsCount . $times . $pEnd;
    echo $hiddenBanner;
    echo $timeResult;
    echo $birthday;
    ?>

    <div class="forms">
        <form action="cookies.php" method="POST">
            <fieldset>
                <label for="date">Введите дату рождения</label>
                <input id="date" name="date" type="date" placeholder="2000-03-29"
                       min="1970-01-01" max="2070-01-01" required>
            </fieldset>
            <input type="submit" value="Отправить">
        </form>

        <form action="cookies.php" method="POST">
            <fieldset>
                <label for="theme">Тема сайта</label>
                <select id="theme" name="theme" required>
                    <option>Green</option>
                    <option>Yellow</option>
                    <option>Red</option>
                    <option>Reggy</option>
                </select>
            </fieldset>
            <input type="submit" value="Применить">
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