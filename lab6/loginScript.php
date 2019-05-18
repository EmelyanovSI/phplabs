<?php

function user_exists()
{
    $authfile = fopen('auth.txt', 'r');
    while (!feof($authfile)) {
        $entry = fgets($authfile);
        if (!empty($entry)) {
            $attr = explode(';', $entry);
            $login = $attr[0];
            $password = $attr[1];
            if ($login == $_POST['login'] and md5($_POST['password']) == $password) {
                fclose($authfile);
                return $attr[3];
            }
        }
    }
    fclose($authfile);
    return -1;
}

if (!empty($_POST)) {
    $logRes = user_exists();
    if ($logRes != -1) {
        session_start();
        $_SESSION['auth']['success'] = true;
        $_SESSION['auth']['login'] = $_POST['login'];
        $_SESSION['auth']['rights'] = $logRes;
        header("Location: http://localhost:63342/phplabs/lab6/login2.php");
        exit;
    } else header("Location: http://localhost:63342/phplabs/lab6/login.php");
}
