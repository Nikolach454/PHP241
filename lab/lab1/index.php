<?php
$a = 148;
$b = 76;
$c = "голубя";


$otvet = $a - $b." ".$c;
echo "Заданеие 25";
echo "<BR>";
echo $otvet;
echo "<BR>";


echo "Заданеие 1";
echo "<BR>";
$a = 27; $b = 12;
$c = sqrt($a^2 + $b^2);

echo sprintf("%.2f", $c);


echo "<BR>";
echo "Заданеие 35";
echo "<BR>";

$a = 36;
$b = '4';

$ostatok = $a % $b;
$type = gettype($otvet);

$result = ($a % $b > 0) 
    ? "Тип данных: " . gettype($a / $b) . ", Остаток: " . ($a % $b) 
    : ($a . " / " . $b . " = " . ($a / $b));

echo $result;

echo "<BR>";
echo "Заданеие 41";
echo "<BR>";

$c = -27;
$b = 12;

if ($c >0 && $b > 0) {
    $result = $c ** $b;
    echo $result;
} elseif ($c<0 && $b<0) {
    $result = $c - $b;
    echo $result;
} else {
    $result = $c * $b;
    echo $result;
}


echo "<BR>";
echo "Заданеие 51";
echo "<BR>";



$sum = 0;
$count = 0;
$currentNumber = 1;

while ($count < 20) {
    $sum += $currentNumber;
    $currentNumber += 2;
    $count++;
}

echo "Сумма первых 20 нечетных членов натурального ряда: " . $sum;
?>