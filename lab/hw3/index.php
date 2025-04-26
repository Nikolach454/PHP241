<?php

$uravnenieNormal = "12-x=-18";
$uravnenieHard = "x/8=6";


function solveEquation($equation) {
    $equation = str_replace(' ', '', $equation);
    $parts = explode('=', $equation);
    if (count($parts) != 2) {
        return "Неверный формат уравнения";
    }

    $left = $parts[0];
    $right = $parts[1];

    if (strpos($left, '+') !== false) {
        $operator = '+';
    } else if (strpos($left, '-') !== false) {
        $operator = '-';
    } else if (strpos($left, '*') !== false) {
        $operator = '*';
    } else if (strpos($left, '/') !== false) {
        $operator = '/';
    } else {
        return "Оператор не найден";
    }

    $operands = explode($operator, $left);
    if (count($operands) != 2) {
        return "Ошибка при разборе левой части";
    }

    $a = $operands[0];
    $b = $operands[1];
    $res = floatval($right);

    if ($a === 'x') {
        $num = floatval($b);
        if ($operator === '+') {
            $x = $res - $num;
        } else if ($operator === '-') {
            $x = $res + $num;
        } else if ($operator === '*') {
            $x = $res / $num;
        } else if ($operator === '/') {
            $x = $res * $num;
        }
    } else if ($b === 'x') {
        $num = floatval($a);
        if ($operator === '+') {
            $x = $res - $num;
        } else if ($operator === '-') {
            $x = $num - $res;
        } else if ($operator === '*') {
            $x = $res / $num;
        } else if ($operator === '/') {
            $x = $num / $res;
        }
    } else {
        return "Переменная x не найдена";
    }

    return "x = " . $x;
}

echo "Млосердов Николай Сергеевич 241-321 Домашнее задание: уравнение.";
echo "<BR>";

echo solveEquation($uravnenieNormal);
echo "<BR>";
echo solveEquation($uravnenieHard);
