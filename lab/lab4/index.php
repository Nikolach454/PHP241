<?php

echo "<BR>";
echo "Заданеие 8   На карманы в самой регулярке Дана строка 'aaa bcd xxx efg'. Найдите строки, состоящие из одинаковых символов (это будет aaa xxx).";
echo "<BR>";

$input = 'aaa bcd xxx efg';

$pattern = '/\b([a-zA-Z])\1{2,}\b/';

preg_match_all($pattern, $input, $matches);

if (!empty($matches[0])) {
    echo "Найденные строки: " . implode(", ", $matches[0]);
} else {
    echo "Совпадений не найдено.";
}



echo "<BR>";
echo "Заданеие 16    На \b, \B Дана строка 'xbx aca aea abba adca abea'. Напишите регулярку, которая вокруг каждого слова вставит '!' (получится '!xbx! !aca! !aea! !abba! !adca! !abea!').";
echo "<BR>";


$inputString = 'xbx aca ae_a abba adca abea';

$pattern = '/\b(\w+)\b/';
$replacement = '!$1!';


$output = preg_replace($pattern, $replacement, $inputString);
echo $output;



echo "<BR>";
echo "Заданеие 24     На позитивный и негативный просмотр Дана строка со звездочками 'aaa * bbb ** eee *** kkk ****'. Замените на '!' только двойные звездочки, но не одиночные или тройные и более";
echo "<BR>";




$inputString = 'aaa * bbb ** eee *** kkk ****';


$pattern = '/(?<!\*)\*\*(?!\*)/';
$replacement = '!';

$output = preg_replace($pattern, $replacement, $inputString);

echo $output;


echo "<BR>";
echo "Заданеие 32";
echo "<BR>";


$str = 'ab c 321           def 45  ghi6 78 9';
$pattern = '/\d+/';

preg_match_all($pattern, $str, $matches);

$sum = array_sum($matches[0]);

echo "Сумма чисел: $sum";






echo "<BR>";
echo "Заданеие 40";
echo "<BR>";


$str = 'aa aba abba abbba abbbba abbbbba';
$pattern = '/\bab{2,4}a\b/';

preg_match_all($pattern, $str, $matches);
echo "Найдено: " . implode(', ', $matches[0]);

?>
