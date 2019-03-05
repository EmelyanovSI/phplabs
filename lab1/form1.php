<DOCTYPE HTML>

    <html lang="en">

    <head>
        <title>lab1</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/lab1.css">
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
            <div id="searchBox">
                <input id="searchText" type="search" name="searchText" placeholder="Search for labs!" autofocus>
                <button id="searchBtn" type="button" value="search"><i class="fas fa-search"></i></button>
            </div>
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
        <p>Учет продаж в обувном магазине</p>
        <ul class="subMenu">
            <li class="active2"><a href="form1.php">АССОРТИМЕНТ</a></li>
            <li><a href="form2.php">ПОСТУПЛЕНИЕ</a></li>
            <li><a href="form3.php">ПРОДАЖА</a></li>
        </ul>
    </nav>

    <main>
        <div class="forms">
            <form  class="form1" name="form11" action="res1.php">
                <fieldset>
                    <legend>АССОРТИМЕНТ(R)</legend>

                    <!--****************************-->
                    <label for="search">Поиск:</label>
                    <input id="search" name="search" type="search" placeholder="surfing">
                    <br>

                    <!--****************************-->
                    <label for="name">Наименование</label>
                    <input id="name" name="name" type="text" size="13" placeholder="Иванов" required><span></span>
                    <br>

                    <!--****************************-->
                    <label for="manufacturer">Производитель</label>
                    <select id="manufacturer" name="manufacturer">
                        <option value="Первая" name="manufacturer['0']" selected>Первая</option>
                        <option value="Вторая" name="manufacturer['1']">Вторая</option>
                        <option value="Третья"  name="manufacturer['2']">Третья</option>
                    </select>
                    <br>

                    <!--****************************-->
                    <label for="date">Дата выпуска</label>
                    <input type="date" id="date" placeholder="2000-03-29" min="1970-01-01" max="2080-01-01" required>
                    <br>

                    <!--****************************-->
                    <label for="price">Цена</label>
                    <input id="price" name="price" type="text" list="priceList">
                    <datalist id="priceList">
                        <select>
                            <option value="Первое" name="price['0']"></option>
                            <option value="Второе" name="price['1']"></option>
                            <option value="Третье" name="price['2']"></option>
                        </select>
                    </datalist>

                </fieldset>
                <input type="submit" value="Отправить">
                <input type="reset" class="rest" value="Очистить">
            </form>

            <form class="form1" name="form12" action="">
                <fieldset>
                    <legend>АССОРТИМЕНТ</legend>
                    <label for="search">Поиск:</label>
                    <input id="search" name="search" type="search" placeholder="surfing">
                    <br>
                    <label for="">Наименование</label>
                    <input id="familiaglav" type="text" size="13" placeholder="Иванов" required><span></span>

                    <br>
                    <label for="">Производитель</label>
                    <select id="chooseMed">
                        <option value="Первая" selected>Первая</option>
                        <option value="Вторая">Вторая</option>
                        <option value="Третья">Третья</option>
                    </select>
                    <br>
                    <label for="">Дата выпуска</label>
                    <input type="date" id="birthday" placeholder="2000-03-29" min="1970-01-01" max="2000-01-01" required>
                    <br>
                    <label for="">Цена</label>
                    <input id="otdel2" name="otdel" type="text" list="otdelhlp">
                    <datalist id="otdelhlp">
                        <select>
                            <option value="Первое"></option>
                            <option value="Второе"></option>
                            <option value="Третье"></option>
                        </select>
                    </datalist>
                </fieldset>
                <input type="submit" value="Отправить">
                <input type="reset" class="rest" value="Очистить">
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

    </body>

    </html>