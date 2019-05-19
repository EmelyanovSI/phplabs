<!DOCTYPE HTML>

<html lang="en">

<head>
    <title>phpKr1</title>
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
            <li><a href="search.php">Поиск по стране</a></li>
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

                            <label for="profile">Анкета</label>
                            <input name="document['profile']" id="profile" type="checkbox" value="Анкета">

                            <label for="passport">Паспорт</label>
                            <input name="document['passport']" id="passport" type="checkbox" value="Паспорт" checked>

                            <label for="insurance">Страховка</label>
                            <input name="document['insurance']" id="insurance" type="checkbox" value="Страховка">
                        </fieldset>

                        <fieldset>
                            <legend>Страна</legend>

                            <label for="country">Страна</label>
                            <select name="country" id="country">
                                <option>Турция</option>
                                <option>Греция</option>
                                <option>Албания</option>
                                <option>Украина</option>
                            </select>

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
                                <option value="Холодильник">Холодильник</option>
                            </select>
                        </fieldset>

                        <fieldset>
                            <legend>Продолжительность</legend>

                            <label for="number1">5</label>
                            <input name="number['5']" id="number1" value="5" type="radio" checked>

                            <label for="number2">7</label>
                            <input name="number['7']" id="number2" value="7" type="radio">

                            <label for="number3">10</label>
                            <input name="number['10']" id="number3" value="10" type="radio">

                            <label for="number4">14</label>
                            <input name="number['14']" id="number4" value="14" type="radio">
                        </fieldset>
                    </div>
                </div>
            </fieldset>
            <input type="submit" name="submit" value="Отправить">
        </form>
    </div>

    <?php
    if (isset($_GET['submit'])) {
        $form = fopen("data.txt", 'a') or die("<p class='notFind'>Не удалось создать файл!</p>");
        flock($form, LOCK_EX); //БЛОКИРОВКА ФАЙЛА

        $table = "";

        $FIO = "";
        foreach ($_GET['FIO'] as $value)
            $FIO .= $value . ' ';

        $documents = "";
        $i = 0;
        foreach ($_GET['document'] as $value) {
            if ($i == 0)
                $documents .= $value;
            else
                $documents .= ', ' . $value;
            $i++;
        }

        $facilities = isset($_GET['facilities']) ? $_GET['facilities'] : null;
        if ($facilities) {
            $facilities = "";
            $i = 0;
            foreach ($_GET['facilities'] as $value) {
                if ($i == 0)
                    $facilities .= $value;
                else
                    $facilities .= ', ' . $value;
                $i++;
            }
        }

        $number = "";
        foreach ($_GET['number'] as $value)
            $number .= $value;

        $table .= $FIO . ";";
        $table .= $documents . ";";
        $table .= $_GET['country'] . ";";
        $table .= $_GET['room'] . ";";
        $table .= $facilities . ";";
        $table .= $number . ";";
        $table .= PHP_EOL;

        fwrite($form, $table);
        flock($form, LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
        fclose($form);
        echo "<p class='added swing'>Данные успешно добавлены!</p>";
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
