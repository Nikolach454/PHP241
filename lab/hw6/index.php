<?php
echo "<BR>";
echo "Заданеие 1";
echo "<BR>";


$str = 'waaa baaa xaaa zaaa baaa';

$pattern = '/(?<=[^b])aaa/';
$result = preg_replace($pattern, '!', $str);

echo $result;




echo "<BR>";
echo "Заданеие 2";
echo "<BR>";


$str = 'a1b2c3';
$result = preg_replace('/\d/', '$0$0', $str);

echo $result;



echo "<BR>";
echo "Заданеие 3";
echo "<BR>";



$str = 'aa aba abba abbba abbbba abbbbba';
$pattern = '/\bab{1,3}a\b/';

preg_match_all($pattern, $str, $matches);
echo "Найдено: " . implode(', ', $matches[0]);






echo "<BR>";
echo "Заданеие 4";
echo "<BR>";

$str = 'aba aca aea abba adca abea';
$pattern = '/\ba.{2}a\b/';

preg_match_all($pattern, $str, $matches);
echo "Найдено: " . implode(', ', $matches[0]);



?>