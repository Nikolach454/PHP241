<?php

echo "Млосердов Николай Сергеевич 241-321 Домашнее задание: уравнение.";
echo "<BR>";

echo "<BR>";
echo "Заданеие 1";
echo "<BR>";

$arr = ['a', '-', 'b', '-', 'c', '-', 'd'];
$pos = array_search('-', $arr);
echo $pos;

echo "<BR>";
echo "Заданеие 2";
echo "<BR>";

$str = implode('-', range(1, 9));
echo $str;

echo "<BR>";
echo "Заданеие 3";
echo "<BR>";

$arr = ['green'=>'зеленый', 'red'=>'красный','blue'=>'голубой'];
foreach ($arr as $key => $value) {
    echo "$key - $value<br>";
}


echo "<BR>";
echo "Заданеие 4";
echo "<BR>";

$arr = ['3'=>'a', '1'=>'c', '2'=>'e', '4'=>'b'];

asort($arr);
print_r($arr);

arsort($arr);
print_r($arr); 

ksort($arr);
print_r($arr);

krsort($arr);
print_r($arr);

sort($arr);
print_r($arr); 

rsort($arr);
print_r($arr); 

echo "<BR>";
echo "Заданеие 5";
echo "<BR>";

function getDivisors($num) {
    $divisors = [];
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i === 0) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}

function getCommonDivisors($a, $b) {
    $divA = getDivisors($a);
    $divB = getDivisors($b);
    $common = [];

    foreach ($divA as $val) {
        if (in_array($val, $divB)) {
            $common[] = $val;
        }
    }

    return $common;
}

print_r(getCommonDivisors(12, 18));
?>