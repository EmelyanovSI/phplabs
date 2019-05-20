<?php

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
    $query = "INSERT INTO users VALUES(NULL, '$login', '$password', '$name', '$secname', '$age', '$email', 0)";
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
        header("Location: http://localhost:63342/phplabs/lab8/view.php");
        exit;
    }
}
