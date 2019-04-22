<?php ?>
<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpLabs</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
</head>

<body>
<header>
    <div class="divHeader">
        <a href="index.php"><img class="menuImg" src="images/greenBlockMenu.png" alt="menu img"></a>
        <div class="title">
            <span class="FIO">Emelyanov Sergey Igorevich</span>
            <span class="option">Option16</span>
        </div>
        <form id="searchBox" action="" method="get">
            <input id="searchText" type="search" name="searchText" placeholder="Search for labs!" autofocus>
            <button id="searchBtn" type="button" value="search"><i class="fas fa-search"></i></button>
        </form>
        <div class="indexSubMenuDiv">
            <a href="index.php">
                <img class="menuImg indexSubMenuDivImg" src="images/greenColumnMenu.png" alt="sub-menu img">
            </a>
            <nav class="indexSubNav">
                <ul class="indexSubMenu">
                    <li><a href="xml/lab1/lab1.xml">xmlab1</a></li>
                    <li><a href="xml/lab2/lab2.xml">xmlab2</a></li>
                    <li><a href="xml/lab3/lab3.xml">xmlab3</a></li>
                    <li><a href="xml/lab4/lab4.xml">xmlab4</a></li>
                    <li><a href="xml/lab5/lab5.xml">xmlab5</a></li>
                    <li><a href="xml/lab6/lab6.xml">xmlab6</a></li>
                    <li><a href="kr1/add.php">phpKr1</a></li>
                    <li><a href="kr2/">phpKr2</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <nav class="navHeader">
        <ul class="mainMenu">
            <li><a href="lab1/form1.php">Form</a></li>
            <li><a href="lab2/add.php">Text file</a></li>
            <li><a href="lab3/cookies.php">Cookies</a></li>
            <li><a href="lab4/shop.php">Session</a></li>
            <li><a href="lab5/regular.html">Regular</a></li>
            <li><a href="lab6/lab6.php">Authorization</a></li>
            <li><a href="lab7/lab7.php">Database</a></li>
            <li><a href="lab8/lab8.php">Registration and database</a></li>
        </ul>
    </nav>
</header>

<nav class="subNav">
    <p class="mainP">Time to<span>&emsp14;php&emsp14;</span>coding!</p>
</nav>

<main>
    <img class="php swing" src="images/php.jpg" alt="php">
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

<script src="scripts/main.js" type="text/javascript" language="JavaScript"></script>
<script src="scripts/jquery-3.4.0.js" type="text/javascript" language="JavaScript"></script>
<script src="scripts/navigation.js" type="text/javascript" language="JavaScript"></script>

</body>

</html>