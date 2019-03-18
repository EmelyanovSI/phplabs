<DOCTYPE HTML>

    <html lang="en">

    <head>
        <title>phpLab2</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/main.css">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/lab1.css">
        <link rel="stylesheet" href="../styles/lab2.css">
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
        </div>
        <nav class="navHeader">
            <ul class="mainMenu">
                <li><a href="../lab1/form1.php">Form</a></li>
                <li class="active"><a href="add.php">Text file</a></li>
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
        <p>Учет продаж в обувном магазине</p>
        <ul class="subMenu">
            <li><a href="add.php">ДОБАВИТЬ ДАННЫЕ</a></li>
            <li><a href="view.php">ПРОСМОТР ДАННЫХ</a></li>
            <li><a href="sorting.php">СОРТИРОВКА ДАННЫХ</a></li>
            <li class="active2"><a href="search.php">ПОИСК ДАННЫХ</a></li>
        </ul>
    </nav>

    <main>

        <div class="forms">
            <form name="form1" action="" method="get">
                <fieldset>
                    <label for="name1">АССОРТИМЕНТ</label>
                    <select id="name1" name="name1">
                        <option value="0">Наименование</option>
                        <option value="1">Производитель</option>
                        <option value="2">Сайт</option>
                        <option value="3">Дата выпуска</option>
                        <option value="4">Цена</option>
                    </select>
                    <input id="search1" name="search1" type="text" placeholder="Поиск...">
                </fieldset>
                <input type="submit" value="Найти" name="form1Btn">
            </form>

            <form name="form2" action="" method="get">
                <fieldset>
                    <label for="name2">ПОСТУПЛЕНИЕ</label>
                    <select id="name2" name="name2">
                        <option value="0">Наименование</option>
                        <option value="1">Количество</option>
                        <option value="2">Дата поступления</option>
                        <option value="3">Номер телефона</option>
                    </select>
                    <input id="search2" name="search2" type="text" placeholder="Поиск...">
                </fieldset>
                <input type="submit" value="Найти" name="form2Btn">
            </form>

            <form name="form3" action="" method="get">
                <fieldset>
                    <label for="name3">ПРОДАЖА</label>
                    <select id="name3" name="name3">
                        <option value="0">Наименование</option>
                        <option value="1">Количество</option>
                        <option value="2">Дата продажи</option>
                        <option value="3">E-mail</option>
                    </select>
                    <input id="search3" name="search3" type="text" placeholder="Поиск...">
                </fieldset>
                <input type="submit" value="Найти" name="form3Btn">
            </form>
        </div>

        <?php
        $notOpen1 = "<p class='notFind'>Не удалось открыть файл 'АССОРТИМЕНТ'</p>";
        $notOpen2 = "<p class='notFind'>Не удалось открыть файл 'ПОСТУПЛЕНИЕ'</p>";
        $notOpen3 = "<p class='notFind'>Не удалось открыть файл 'ПРОДАЖА'</p>";
        $notFind = "<p class='notFind'>Ничего не найдено</p>";

        if (isset($_GET['form1Btn'])) {
            $form1File = fopen("range.txt", 'r') or die($notOpen1);

            $x = $_GET['name1'];
            $i = 0;
            while (!feof($form1File)) {
                $str = htmlentities(fgets($form1File));
                if (!empty($str)) {
                    $temp=explode(";", $str);
                    if($temp[$x]==$_GET['search1']) $mas[$i++] = $temp;
                }
            }
            fclose($form1File);

            $table = "<table>";
            $table .= "<caption>АССОРТИМЕНТ</caption>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Производитель</th>";
            $table .= "<th>Сайт</th>";
            $table .= "<th>Дата выпуска</th>";
            $table .= "<th>Цена</th>";
            $table .= "</tr>";

            if ($i>0){
                foreach ($mas as $value) {
                    $table .= "<tr>";
                    $table .= "<td>" . $value[0] . "</td>";
                    $table .= "<td>" . $value[1] . "</td>";
                    $table .= "<td>" . $value[2] . "</td>";
                    $table .= "<td>" . $value[3] . "</td>";
                    $table .= "<td>" . $value[4] . "</td>";
                    $table .= "</tr>";
                }
                $table .= "</table>";
                echo $table;
            }
            else echo $notFind;
        }

        if (isset($_GET['form2Btn'])) {
            $ownersFile = fopen("receipt.txt", 'r') or die($notOpen2);


            $x = $_GET['name2'];

            $i = 0;
            while (!feof($ownersFile)) {
                $str = htmlentities(fgets($ownersFile));
                if (!empty($str)) {
                    $temp=explode(";", $str);
                    if($temp[$x]==$_GET['search2']) $mas[$i++] = $temp;
                }
            }
            fclose($ownersFile);

            $table = "<table>";
            $table .= "<caption>ПОСТУПЛЕНИЕ</caption>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Количество</th>";
            $table .= "<th>Дата поступления</th>";
            $table .= "<th>Номер телефона</th>";
            $table .= "</tr>";

            if ($i>0) {
                foreach ($mas as $value) {
                    $table .= "<tr>";
                    $table .= "<td>" . $value[0] . "</td>";
                    $table .= "<td>" . $value[1] . "</td>";
                    $table .= "<td>" . $value[2] . "</td>";
                    $table .= "<td>" . $value[3] . "</td>";
                    $table .= "</tr>";
                }

                $table .= "</table>";
                echo $table;
            }
            else echo $notFind;
        }

        if (isset($_GET['form3Btn'])) {
            $valueccidFile = fopen("sale.txt", 'r') or die($notOpen3);
            $x = $_GET['name3'];
            $i = 0;
            while (!feof($valueccidFile)) {
                $str = htmlentities(fgets($valueccidFile));
                if (!empty($str)) {
                    $temp=explode(";", $str);
                    if($temp[$x]==$_GET['search3']) $mas[$i++] = $temp;
                }
            }
            fclose($valueccidFile);

            $table = "<table>";
            $table .= "<caption>ПРОДАЖА</caption>";
            $table .= "<tr>";
            $table .= "<th>Наименование</th>";
            $table .= "<th>Количество</th>";
            $table .= "<th>Дата продажи</th>";
            $table .= "<th>E-mail</th>";
            $table .= "</tr>";

            if ($i>0){
                foreach ($mas as $value) {
                    $table .= "<tr>";
                    $table .= "<td>" . $value[0] . "</td>";
                    $table .= "<td>" . $value[1] . "</td>";
                    $table .= "<td>" . $value[2] . "</td>";
                    $table .= "<td>" . $value[3] . "</td>";
                    $table .= "</tr>";
                }

                $table .= "</table>";
                echo $table;
            }
            else echo $notFind;
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