<DOCTYPE HTML>

    <html lang="en">

    <head>
        <title>lab1</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/main.css">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/lab1.css">
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
            <form id="searchBox" action="result.php" method="get">
                <input id="searchText" type="search" name="searchText" placeholder="Search for labs!" autofocus>
                <button id="searchBtn" type="submit" value="search"><i class="fas fa-search"></i></button>
                <input id="search" name="search" type="hidden" value="search">
            </form>
        </div>
        <nav class="navHeader">
            <ul class="mainMenu">
                <li class="active"><a href="form1.php">Form</a></li>
                <li><a href="#">Text file</a></li>
                <li><a href="#">Cookies</a></li>
                <li><a href="#">Sessions</a></li>
                <li><a href="#">Regulars</a></li>
                <li><a href="#">Authorization</a></li>
                <li><a href="#">Database</a></li>
                <li><a href="#">Registration and database</a></li>
            </ul>
        </nav>
    </header>

    <nav class="subNav">
        <p>Результат учета продаж в обувном магазине</p>
        <ul class="subMenu">
            <li><a href="form1.php">АССОРТИМЕНТ</a></li>
            <li><a href="form2.php">ПОСТУПЛЕНИЕ</a></li>
            <li><a href="form3.php">ПРОДАЖА</a></li>
            <li class="active2"><a href="result.php">РЕЗУЛЬТАТ</a></li>
        </ul>
    </nav>

    <main>

        <?php
        if ($_GET['form1request'] == 'form1request') {
            $table = "<table>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Производитель</th>";
            $table .= "<th>Сайт</th>";
            $table .= "<th>Дата выпуска</th>";
            $table .= "<th>Цена</th>";
            $table .= "</tr>";
            $table .= "<tr>";
            $table .= "<td>".$_GET['name1']."</td>";
            $table .= "<td>".$_GET['manufacturer1']."</td>";
            $table .= "<td>".$_GET['site1']."</td>";
            $table .= "<td>".$_GET['date1']."</td>";
            $table .= "<td>".$_GET['price1']."</td>";
            $table .= "</tr>";
            $table .= "</table>";
            echo $table;
        }
        elseif ($_GET['form2request'] == 'form2request') {
            $table = "<table>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Количество</th>";
            $table .= "<th>Дата поступления</th>";
            $table .= "<th>Номер телефона</th>";
            $table .= "</tr>";
            $table .= "<tr>";
            $table .= "<td>".$_GET['name1']."</td>";
            $table .= "<td>".$_GET['number1']."</td>";
            $table .= "<td>".$_GET['date1']."</td>";
            $table .= "<td>".$_GET['tel1']."</td>";
            $table .= "</tr>";
            $table .= "</table>";
            echo $table;
        }
        elseif ($_GET['form3request'] == 'form3request') {
            $shoes = "";
            $number = "";
            foreach ($_GET['shoes'] as $value)
                $shoes .= $value."<br>";
            foreach ($_GET['number'] as $value)
                $number .= $value."<br>";
            $table = "<table>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Количество</th>";
            $table .= "<th>Дата продажи</th>";
            $table .= "<th>E-mail</th>";
            $table .= "</tr>";
            $table .= "<tr>";
            $table .= "<td>".$shoes."</td>";
            $table .= "<td>".$number."</td>";
            $table .= "<td>".$_GET['date1']."</td>";
            $table .= "<td>".$_GET['email1']."</td>";
            $table .= "</tr>";
            $table .= "</table>";
            echo $table;
        }
        elseif ($_GET['search'] == 'search') {
            $bigMsg = "<p class='searchP swing'>U find me!</p>";
            echo $bigMsg;
        }
        else {
            $str1 = "<tr>
                        <th>Наименование</th>
                        <th>Производитель</th>
                        <th>Сайт</th>
                        <th>Дата выпуска</th>
                        <th>Цена</th>
                    </tr>";
            $str2 = "<tr>
                        <th>Наименование</th>
                        <th>Количество</th>
                        <th>Дата поступления</th>
                        <th>Номер телефона</th>
                    </tr>";
            $str3 = "<tr>
                        <th>Наименование</th>
                        <th>Количество</th>
                        <th>Дата продажи</th>
                        <th>E-mail</th>
                    </tr>";
            $str4 = "<tr>
                        <td>Example</td>
                        <td>Example</td>
                        <td>Example</td>
                        <td>Example</td>
                    </tr>";
            $str5 = "<tr>
                        <td>Example</td>
                        <td>Example</td>
                        <td>Example</td>
                        <td>Example</td>
                        <td>Example</td>
                    </tr>";
            $table1 = "<table>".$str1.$str5.$str5.$str5.$str5."</table>";
            $table2 = "<table>".$str2.$str4.$str4.$str4.$str4."</table>";
            $table3 = "<table>".$str3.$str4.$str4.$str4.$str4."</table>";
            echo $table1;
            echo $table2;
            echo $table3;
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

    </body>

    </html>