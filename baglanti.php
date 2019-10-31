<?php

if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Üzgünüz, Basit PHP Girişi 5.3.7'den küçük bir PHP sürümünde çalışmıyor !");
}
else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("libraries/password_compatibility_library.php");
}

require_once("config/db.php");

require_once("classes/Login.php");

require_once("classes/Placar.php");

$Placar = new Placar();

$login = new Login();

if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            exit($error);
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            exit($message);
        }
    }
}

if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            exit($error);
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            exit($message);
        }
    }
}

?>