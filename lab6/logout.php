<?php
session_start();
session_destroy();
header("Location: http://localhost:63342/phplabs/lab6/login.php");
exit;
