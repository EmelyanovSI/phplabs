<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLab5</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lab1.css">
    <link rel="stylesheet" href="../styles/lab2.css">
    <link rel="stylesheet" href="../styles/lab3.css">
    <link rel="stylesheet" href="../styles/lab4.css">
    <link rel="stylesheet" href="../styles/lab5.css">
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
            <li><a href="../lab4/shop.php">Session</a></li>
            <li class="active"><a href="regular.html">Regular</a></li>
            <li><a href="../lab6/add.php">Authorization</a></li>
            <li><a href="../lab7/add.php">Database</a></li>
            <li><a href="../lab8/lab8.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p class="mainP"><a href="regular.html">Регулярные выражения</a></p>
</nav>

<main>

    <?php
    if ($_GET['numberTask'] == "Task№1") {
        $file = "files.txt";
        $f = fopen($file, "r");
        flock($f, LOCK_SH | LOCK_NB);

        while (!feof($f)) {
            $s = fgets($f);
            if (strcmp($s, "") != 0 && preg_match('/\.' . $_GET["input"] . '/', $s))
                echo "<p class='notFind swing'>" . $s . "</p>";
        }

        flock($f, LOCK_UN);
        fclose($f);
    } else {
        $file = "links.txt";
        $f = fopen($file, "r");
        flock($f, LOCK_SH | LOCK_NB);

        while (!feof($f)) {
            $s = fgets($f);
            if (strcmp($s, "") != 0)
                echo "<p class='notFind swing'>" . preg_replace('/^\D+:\/\//', '', $s) . "</p>";
        }

        flock($f, LOCK_UN);
        fclose($f);
    }
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
