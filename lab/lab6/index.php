<?php


echo "<BR>";
echo "Заданеие 1";
echo "<BR>";

session_start();


if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = 'test';
    echo "Значение записано в сессию. Обновите страницу.<br>";
} else {
    echo "Содержимое сессии: " . $_SESSION['data'];
}


echo "<BR>";
echo "Заданеие 3";
echo "<BR>";


if (isset($_SESSION['counter'])) {
    $_SESSION['counter']++;
    echo "Вы обновили страницу {$_SESSION['counter']} раз.";
} else {
    $_SESSION['counter'] = 0;
    echo "Вы еще не обновляли страницу.";
}


echo "<BR>";
echo "Заданеие 5";
echo "<BR>";

if (!isset($_SESSION['enter_time'])) {
    $_SESSION['enter_time'] = time();
    echo "Вы только что зашли на сайт.";
} else {
    $secondsPassed = time() - $_SESSION['enter_time'];
    echo "Вы зашли на сайт {$secondsPassed} секунд назад.";
}


echo "<BR>";
echo "Заданеие 7";
echo "<BR>";

if (!isset($_COOKIE['test'])) {
    setcookie('test', '123', time() + 3600);
    echo "Кука установлена. Обновите страницу.";
} else {
    echo "Содержимое куки test: " . $_COOKIE['test'];
}

echo "<BR>";
echo "Заданеие 8";
echo "<BR>";
unset($_COOKIE['test']);

echo "Кука 'test' удалена.";


?>