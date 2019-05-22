<?php
session_start();
function delete_user($id)
{
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $password = 'usbw'; //пароль, по умолчанию пустой
    $db_name = 'test'; //имя базы данных

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_set_charset($link, 'utf8');

    $result = mysqli_query($link, "DELETE FROM users WHERE id=$id") or die(mysqli_error($link));
    mysqli_close($link);
}

function ban_user($id, $time)
{
    $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
    $user = 'root'; //имя пользователя, по умолчанию это root
    $dbpassword = 'usbw'; //пароль, по умолчанию пустой
    $db_name = 'test'; //имя базы данных

    $link = mysqli_connect($host, $user, $dbpassword, $db_name);
    mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_set_charset($link, 'utf8');

    $query = "UPDATE users SET blockdate=$time WHERE id=$id";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    mysqli_close($link);
}

if (!empty($_GET)) {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        delete_user($id);

        header("Location: http://localhost:63342/phplabs/lab8/adminpanel.php");
        exit;
    }
    if (isset($_GET['ban'])) {
        $id = $_GET['ban'];
        $time = time() + $_GET['tm'];

        ban_user($id, $time);
        header("Location: http://localhost:63342/phplabs/lab8/adminpanel.php");
        exit;
    }
    if (isset($_GET['unban'])) {
        $id = $_GET['unban'];
        $time = 0;

        ban_user($id, $time);
        header("Location: http://localhost:63342/phplabs/lab8/adminpanel.php");
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
    if (isset($_SESSION['auth']) and $_SESSION['auth']['success'] and ($_SESSION['auth']['rights'] == 1)) {

        $host = 'localhost'; //имя хоста, на локальном компьютере это localhost
        $user = 'root'; //имя пользователя, по умолчанию это root
        $password = 'usbw'; //пароль, по умолчанию пустой
        $db_name = 'test'; //имя базы данных

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

        $table = 'users';
        $result = mysqli_query($link, "SELECT id, login, name, secname, age, email, rights, blockdate FROM "
            . $table . " WHERE id > 0") or die(mysqli_error($link));

        $table = "<table>";
        $table .= "<caption>Список пользователей</caption>";
        $table .= "<tr>";
        $table .= "<th>Логин</th>";
        $table .= "<th>Имя</th>";
        $table .= "<th>Фамилия</th>";
        $table .= "<th>Возраст</th>";
        $table .= "<th>Email</th>";
        $table .= "<th>Права доступа</th>";
        $table .= "<th>Статус</th>";
        $table .= "</tr>";

        $rows = mysqli_num_rows($result);
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
            $table .= "<tr>";
            for ($j = 1; $j < 6; ++$j) $table .= "<td>$row[$j]</td>";

            $row[6] == 1 ? $table .= "<td>Администратор</td>" : $table .= "<td>Пользователь</td>";
            $unban = "<td>";
            if ($row[7] > time()) {
                date_default_timezone_set("UTC");
                try {
                    $dd = (new DateTime())->setTimestamp($row[7]);
                } catch (Exception $e) {
                }
                try {
                    $now = new DateTime();
                } catch (Exception $e) {
                }
                $dif = date_diff($now, $dd);
                $dif = $dif->d . ' д. ' . $dif->h . ' ч. ' . $dif->i . ' м. ' . $dif->s . ' с. ';
                $table .= "<td class='notFind'>Заблокирован, ост. $dif</td>";

                $ck3 = "alert(\"Разблокировать?\")";
                $unban .= "<a href='?unban=$row[0]' onclick='" . $ck3 . "'>Разблокировать</a>";
            } else {
                $table .= "<td class='added'>Не заблокирован</td>";
            }
            $unban .= "</td>";
            $ck1 = "alert(\"Забанить?\"); document.getElementById(\"frm\").submit(); return false;";

            $table .= "<td>";
            $table .= "<form name='frm' id='frm'>";
            $table .= "<select name='tm'>";
            $table .= "<option value='60'>Минута</option>";
            $table .= "<option value='3600'>Час</option>";
            $table .= "<option value='86400'>День</option>";
            $table .= "<option value='604800'>Неделя</option>";
            $table .= "<option value='2419200'>Месяц</option>";
            $table .= "</select>";
            $table .= "<input type='hidden' value='$row[0]' name='ban'>";
            $table .= "</form>";
            $table .= "<a href='#' onclick='" . $ck1 . "'>Забанить</a>";
            $table .= "</td>";

            $table .= $unban;
            $ck2 = "alert(\"Удалить?\")";

            $table .= "<td>";
            $table .= "<a href='?del=$row[0]' onclick='" . $ck2 . "'>Удалить</a>";
            $table .= "</td>";
            $table .= "</tr>";
        }
        mysqli_free_result($result);
        $table .= "</table>";
        echo $table;

        $table = 'users';
        $result = mysqli_query($link, "SELECT * FROM " . $table . " WHERE id > 0")
        or die(mysqli_error($link));
        $rows = mysqli_num_rows($result);
        $admins = 0;
        $banned = 0;
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result);
            if ($row[7] == 1) $admins++;
            if ($row[8] > time()) $banned++;
        }
        mysqli_free_result($result);
        ?>

        <p class="added swing">Статистика пользователей</p>
        <p class="added swing">Всего пользователей: <?php echo $rows; ?></p>
        <p class="added swing">Администраторов: <?php echo $admins; ?></p>
        <p class="notFind swing">Забаненных пользователей: <?php echo $banned; ?></p>

    <?php } else echo '<p class="notFind">Войдите на сайт с правами администратора для добавления данных.</p>';
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
