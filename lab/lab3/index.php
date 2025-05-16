<?php

$test = "./test.txt";
$copy = "./copy.txt";

echo "<BR>";
echo "Заданеие 2";
echo "<BR>";

echo require_once($test);



echo "<BR>";
echo "Заданеие 8";
echo "<BR>";


copy($test, $copy);
echo require_once($copy);


echo "<BR>";
echo "Заданеие 14";
echo "<BR>";

$sourceFile = './dir1/test.txt';
$destinationFile = './dir2/test.txt';


if (file_exists($sourceFile)) {
    if (rename($sourceFile, $destinationFile)) {
        echo "Файл успешно перемещен из dir1 в dir2.";
    } else {
        echo "Ошибка при перемещении файла.";
    }
} else {
    echo "Исходный файл не найден.";
}


echo "<BR>";
echo "Заданеие 19";
echo "<BR>";

$inputFile = './test.txt';
$outputFile = './sum.txt';

$handle = fopen($inputFile, 'r');
if ($handle) {
    $sum = 0;
    while (($line = fgets($handle)) !== false) {
        $sum += (float)$line;
    }

    fclose($handle);
    file_put_contents($outputFile, $sum);
    echo "$sum";
}

echo "<BR>";
echo "Заданеие 29";
echo "<BR>";


$handle = fopen($inputFile, 'r');
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        echo htmlspecialchars($line) . "<br>";
    }
    fclose($handle);
}
?>