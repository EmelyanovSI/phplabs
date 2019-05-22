<?php
session_start();
function login_exists($login, $id)
{
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $password = 'usbw'; //пароль, по умолчанию пустой
    $db_name = 'test'; //имя базы данных

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_set_charset($link, 'utf8');

    $result = mysqli_query($link, "SELECT * FROM users WHERE (login='$login' AND id!=$id)")
    or die(mysqli_error($link));
    $rows = mysqli_num_rows($result);
    mysqli_free_result($result);
    mysqli_close($link);
    return $rows;
}

function update_user($login, $password, $name, $secname, $age, $email, $id)
{
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $dbpassword = 'usbw'; //пароль, по умолчанию пустой
    $db_name = 'test'; //имя базы данных

    $link = mysqli_connect($host, $user, $dbpassword, $db_name);
    mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_set_charset($link, 'utf8');

    if ($password != '') {
        $password = md5($password . "MyUniqueSault");
        $query = "UPDATE users SET login='$login', password='$password', name='$name',
                                    secname='$secname', age=$age, email='$email' WHERE id=$id";
    } else
        $query = "UPDATE users SET login='$login', name='$name', secname='$secname', age=$age, email='$email'
                  WHERE id=$id";

    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    mysqli_close($link);
}

function get_user($id)
{
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $password = 'usbw'; //пароль, по умолчанию пустой
    $db_name = 'test'; //имя базы данных

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_set_charset($link, 'utf8');

    $result = mysqli_query($link, "SELECT * FROM users WHERE id=$id") or die(mysqli_error($link));
    $rows = mysqli_num_rows($result);

    mysqli_close($link);
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    return $row;
}

$error = "";
if (!empty($_POST)) {

    if (strlen($_POST['login']) < 4 or strlen($_POST['login']) > 12)
        $error .= "<p class='notFind'>Логин от 4 до 12 символов.</p>";
    if (login_exists($_POST['login'], $_GET['id']))
        $error .= "<p class='notFind'>Данный логин занят.</p>";
    if ($_POST['password'] != "" and (strlen($_POST['password']) < 6 or strlen($_POST['password']) > 10))
        $error .= "<p class='notFind'>Пароль от 6 до 10 символов.</p>";
    if ($_POST['name'] == "")
        $error .= "<p class='notFind'>Неверное значение имени.</p>";
    if ($_POST['secname'] == "")
        $error .= "<p class='notFind'>Неверное значение фамилии.</p>";

    if ($_POST['email'] != "") {
        $emailReg = "/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/ui";
        if (!preg_match($emailReg, $_POST['email'])) $error .= "<p class='notFind'>Неверное значение e-mail.</p>";
    }

    if ($error == "") {
        $id = $_GET['id'];
        update_user($_POST['login'], $_POST['password'], $_POST['name'], $_POST['secname'],
            $_POST['age'], $_POST['email'], $_GET['id']);
        $_SESSION['auth']['success'] = true;

        $_SESSION['auth']['login'] = $_POST['login'] . ' (' . $_POST['name'] . ' ' . $_POST['secname'] . ')';
        $_SESSION['auth']['rights'] = 0;
        header("Location: http://localhost:63342/phplabs/lab8/profile.php?id=" . $id);
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

    <?php
    if (isset($_SESSION['auth']) and $_SESSION['auth']['success']) {

        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $user = 'root'; //имя пользователя, по умолчанию это root
        $password = 'usbw'; //пароль, по умолчанию пустой
        $db_name = 'test'; //имя базы данных

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

        $id = $_GET['id'];
        $result = mysqli_query($link, "SELECT * FROM users WHERE id=$id") or die(mysqli_error($link));
        $rows = mysqli_num_rows($result);
        mysqli_close($link);
        if ($rows > 0) {
            $row = mysqli_fetch_row($result);
            mysqli_free_result($result);
        }
        ?>

        <p class="added">Профиль пользователя</p>
        <p class="added">Последний вход на сайт

            <?php
            date_default_timezone_set("UTC");
            $attend = isset($_COOKIE['attend']) ? $_COOKIE['attend'] : -1;
            if ($attend == -1) echo "никогда прежде.";
            else {
                try {
                    $dd = (new DateTime())->setTimestamp($attend);
                } catch (Exception $e) {
                }
                try {
                    $now = new DateTime();
                } catch (Exception $e) {
                }
                $dif = date_diff($now, $dd);
                $dif = $dif->d . ' дн. ' . $dif->h . ' ч. ' . $dif->i . ' мин. ' . $dif->s . ' с. ';
                echo $dif;
            }
            ?>

        </p>

        <?php
        $user = get_user($_SESSION['auth']['id']);
        if ($user[8] > time()) {
            date_default_timezone_set("UTC");
            try {
                $dd = (new DateTime())->setTimestamp($user[8]);
            } catch (Exception $e) {
            }
            try {
                $now = new DateTime();
            } catch (Exception $e) {
            }
            $dif = date_diff($now, $dd);
            $dif = $dif->d . ' д. ' . $dif->h . ' ч. ' . $dif->i . ' м. ' . $dif->s . ' с. ';
            echo '<p class="notFind">Вы забанены на ' . $dif . '</p>';
        } else {
            ?>
            <div class="forms">
                <form name="form1" action="" method="POST" novalidate>
                    <?php
                    if (!empty($_POST) and $error)
                        echo '<p class="notFind">' . $error . '</p>';
                    ?>
                    <fieldset>
                        <legend>Изменение профиля</legend>

                        <label for="login">Логин</label>
                        <input type="text" id="login" name="login" value='<?php echo $row[1]; ?>'>

                        <label for="name">Имя</label>
                        <input type="text" id="name" name="name" value='<?php echo $row[3]; ?>'>

                        <label for="secname">Фамилия</label>
                        <input type="text" id="secname" name="secname" value='<?php echo $row[4]; ?>'>

                        <label for="age">Возраст</label>
                        <input type="number" id="age" name="age" min="1" value='<?php echo $row[5]; ?>'>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value='<?php echo $row[6]; ?>'>

                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password" autocomplete="off">
                    </fieldset>

                    <input type="submit" value="Изменить">
                    <input type="reset" class="rest" value="Отмена">
                </form>
            </div>
            <?php
        }
    } else echo '<p class="notFind">Войдите на сайт для получения доступа</p>';
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
