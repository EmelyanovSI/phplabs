<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpKr2</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <p class="title">Emelyanov Sergey Igorevich</p>
    <nav>
        <ul class="mainMenu">
            <li class="active"><a href="add.php">Ввод данных</a></li>
            <li><a href="read.php">Чтение данных</a></li>
            <li><a href="sort.php">Сортировка по фамилии</a></li>
            <li><a href="search.php">Поиск по номеру</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="forms">
        <form name="form" action="add.php" method="get">
            <fieldset>
                <legend>Регистрация</legend>

                <div class="fieldsetContent">
                    <div>
                        <fieldset>
                            <legend>Фамилия, Имя</legend>

                            <label for="surname">Фамилия</label>
                            <input name="FIO['surname']" id="surname" type="text" required>

                            <label for="name">Имя</label>
                            <input name="FIO['name']" id="name" type="text" required>
                        </fieldset>

                        <fieldset>
                            <legend>Документы</legend>

                            <label for="profile">Оплачено</label>
                            <input name="document['profile']" id="profile" type="checkbox" value="Анкета" checked>

                            <label for="passport">Паспорт сдан</label>
                            <input name="document['passport']" id="passport" type="checkbox" value="Паспорт">
                        </fieldset>

                        <fieldset>
                            <legend>Выбор номера</legend>

                            <label for="room">Номер</label>
                            <select name="room" id="room">
                                <option>Одноместный</option>
                                <option>Двуместный</option>
                                <option>Трехместный</option>
                                <option>Четырехместный</option>
                            </select>
                        </fieldset>
                    </div>

                    <div>
                        <fieldset>
                            <legend>Удобства</legend>

                            <label for="facilities"></label>
                            <select name="facilities[]" id="facilities" size="4" multiple>
                                <option value="Кондиционер">Кондиционер</option>
                                <option value="Телевизор">Телевизор</option>
                                <option value="Сейф">Сейф</option>
                                <option value="Интернет">Интернет</option>
                            </select>
                        </fieldset>

                        <fieldset>
                            <legend>Пол</legend>

                            <label for="number1">Мужской</label>
                            <input name="number['Мужской']" id="number1" value="Мужской" type="radio" checked>

                            <label for="number2">Женский</label>
                            <input name="number['Женский']" id="number2" value="Мужской" type="radio">
                        </fieldset>
                    </div>
                </div>
            </fieldset>
            <input type="submit" name="submit" value="Отправить">
        </form>
    </div>

    <?php
    if (isset($_GET['submit'])) {

        $host = 'localhost';
        $user = 'root';
        $password = 'usbw';
        $db_name = 'test';

        $link = mysqli_connect($host, $user, $password, $db_name);
        mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($link, "SET CHARACTER SET 'utf8'");
        mysqli_set_charset($link, 'utf8');

        $name = '';
        if (isset($_GET['FIO']))
            foreach ($_GET['FIO'] as $value) {
                $name .= $value . ' ';
            }

        $doc = '';
        if (isset($_GET['document']))
            foreach ($_GET['document'] as $value) {
                $doc .= $value . ' ';
            }

        $number = $_GET["room"];

        $comfort = '';
        if (isset($_GET['facilities']))
            foreach ($_GET['facilities'] as $value) {
                $comfort .= $value . ' ';
            }

        $pol = '';
        if (isset($_GET['number']))
            foreach ($_GET['number'] as $value) {
                $pol .= $value . ' ';
            }

        $query = "INSERT INTO hotel VALUES(NULL, '$name', '$doc', '$number', '$comfort', '$pol')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        echo "<p class='added'>Данные успешно добавлены</p>";
        mysqli_close($link);
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

</body>
</html>
