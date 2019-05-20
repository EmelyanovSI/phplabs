<?php
session_start();
if (!empty($_POST)) {
    $_SESSION['form1']['login'] = $_POST['login'];
    $_SESSION['form1']['name'] = $_POST['name'];
    $_SESSION['form1']['secname'] = $_POST['secname'];
    $_SESSION['form1']['age'] = $_POST['age'];
    $_SESSION['form1']['email'] = $_POST['email'];
}

$login = '';
$name = '';
$secname = '';
$age = '18';
$email = '';

if (isset ($_SESSION['form1'])) {
    $login = $_SESSION['form1']['login'];
    $name = $_SESSION['form1']['name'];
    $secname = $_SESSION['form1']['secname'];
    $age = $_SESSION['form1']['age'];
    $email = $_SESSION['form1']['email'];
}

function login_exists($login)
{
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $password = 'usbw'; //пароль, по умолчанию пустой
    $db_name = 'test'; //имя базы данных

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_set_charset($link, 'utf8');

    $result = mysqli_query($link, "SELECT * FROM users WHERE login='$login'") or die(mysqli_error($link));
    $rows = mysqli_num_rows($result);
    mysqli_free_result($result);
    mysqli_close($link);
    return $rows;
}

function reg_user($login, $password, $name, $secname, $age, $email)
{
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $dbpassword = 'usbw'; //пароль, по умолчанию пустой
    $db_name = 'test'; //имя базы данных

    $link = mysqli_connect($host, $user, $dbpassword, $db_name);
    mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_set_charset($link, 'utf8');

    $password = md5($password . "MyUniqueSault");
    $query = "INSERT INTO users VALUES(NULL, '$login', '$password', '$name', '$secname', '$age', '$email', 0, 0)";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $result = mysqli_query($link, "SELECT * FROM users WHERE login='$login' AND password='$password'")
    or die(mysqli_error($link));
    $row = mysqli_fetch_row($result);
    mysqli_close($link);
    return $row[0];
}

$error = "";
if (!empty($_POST)) {

    if (strlen($_POST['login']) < 4 or strlen($_POST['login']) > 12)
        $error .= "<p class='notFind'>Логин от 4 до 12 символов.</p>";
    if (login_exists($_POST['login']))
        $error .= "<p class='notFind'>Данный логин занят.</p>";
    if (strlen($_POST['password']) < 6 or strlen($_POST['password']) > 10)
        $error .= "<p class='notFind'>Пароль от 6 до 10 символов.</p>";
    if ($_POST['name'] == "")
        $error .= "<p class='notFind'>Неверное значение имени.</p>";
    if ($_POST['secname'] == "")
        $error .= "<p class='notFind'>Неверное значение фамилии.</p>";

    if ($_POST['email'] != "") {
        $emailReg = "/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/ui";
        if (!preg_match($emailReg, $_POST['email']))
            $error .= "<p class='notFind'>Неверное значение e-mail.</p>";
    }

    if ($error == "") {
        $userId = reg_user($_POST['login'], $_POST['password'], $_POST['name'],
            $_POST['secname'], $_POST['age'], $_POST['email']);
        $_SESSION['auth']['success'] = true;
        $_SESSION['auth']['id'] = $userId;
        $_SESSION['auth']['login'] = $_POST['login'] . ' (' . $_POST['name'] . ' ' . $_POST['secname'] . ')';
        $_SESSION['auth']['rights'] = 0;
        setcookie('attend', time(), time() + 60 * 60 * 24 * 7);
        header("Location: http://localhost:63342/phplabs/lab8/view.php");
        exit;
    }
}
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab8</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
    <link rel="stylesheet" href="../styles/lab3.css">
    <link rel="stylesheet" href="../styles/lab6.css">
    <link rel="stylesheet" href="../styles/lab7.css">
    <link rel="stylesheet" href="../styles/lab8.css">
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
            <button id="searchBtn" type="submit" value="search"><i class="fas fa-search"></i></button>
            <input id="search" name="search" type="hidden" value="search">
        </form>
        <?php include('logButton.php'); ?>
    </div>
    <nav class="navHeader">
        <ul class="mainMenu">
            <li><a href="../lab1/form1.php">Form</a></li>
            <li><a href="../lab2/add.php">Text file</a></li>
            <li><a href="../lab3/cookies.php">Cookies</a></li>
            <li><a href="../lab4/shop.php">Session</a></li>
            <li><a href="../lab5/regular.html">Regular</a></li>
            <li><a href="../lab6/add.php">Authorization</a></li>
            <li><a href="../lab7/add.php">Database</a></li>
            <li class="active"><a href="add.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p>Учет продаж в обувном магазине</p>
    <ul class="subMenu">
        <li><a href="add.php">ДОБАВИТЬ ДАННЫЕ</a></li>
        <li><a href="view.php">ПРОСМОТР ДАННЫХ</a></li>
        <li><a href="sorting.php">СОРТИРОВКА ДАННЫХ</a></li>
        <li><a href="search.php">ПОИСК ДАННЫХ</a></li>
    </ul>
</nav>

<main>

    <div class="forms">
        <form name="form1" action="" method="POST" novalidate>
            <?php
            if (!empty($_POST) and $error)
                echo '<p class="notFind">' . $error . '</p>';
            ?>
            <fieldset>
                <legend>Регистрация</legend>

                <label for="login">Логин</label>
                <input type="text" id="login" name="login" required value='<?php echo $login; ?>'>

                <label for="password">Пароль</label>
                <input type="password" id="password" name="password">

                <label for="name">Имя</label>
                <input type="text" id="name" name="name" required value='<?php echo $name; ?>'>

                <label for="secname">Фамилия</label>
                <input type="text" id="secname" name="secname" required value='<?php echo $secname; ?>'>

                <label for="age">Возраст</label>
                <input type="number" id="age" name="age" min="1" value='<?php echo $age; ?>'>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value='<?php echo $email; ?>'>

            </fieldset>
            <input type="submit" value="Регистрация">
            <input type="reset" class="rest" value="Отмена">
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
