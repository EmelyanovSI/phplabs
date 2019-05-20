<?php
if (isset($_SESSION['auth']) and $_SESSION['auth']['success']) {
    $str = $_SESSION["auth"]["rights"] == 1 ? "Администратор" : "Пользователь";
    $page = $_SESSION["auth"]["rights"] == 1 ? "adminpanel.php" : "profile.php?id=" . $_SESSION["auth"]["id"];

    echo '<div class="login">
            <div class="user">
		        <p>' . $_SESSION["auth"]["login"] . '</p>
		        <p>' . $str . '</p>
	        </div>
	        <a class="logoutBtn" href="logout.php">Выйти</a>
          </div>';
} else echo '<div class="login">
                <a class="loginBtn" href="login.php">Войти</a>
                <a class="loginBtn" href="regist.php">Регистрация</a>
             </div>';
