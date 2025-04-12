<?php

$uravnenieNormal = "12-X=-18";
$uravnenieHard = "X/8=6";




function ($ciferki){
    $operators = "+-*/";
    $len = strlen($ciferki);
    $operator = strpbrk($ciferki, $operators);


    for ($i = 0; $i < $len; $i++) {
        if ($ciferki[$i] === "X") {
            $indexX = $i;
        }
        elseif ($ciferki[$i] === "=") {
            $indexRavno = $i;
        }
        elseif ($ciferki[$i] === $operator[0]) {
            $indexOperator = $i;
        }
    }

    if ($indexX > $indexRavno) {
        var_dump(eval(substr($ciferki, 0, $len-($indexRavno-1))));
    }
    else {
        if ($indexX < $indexOperator) {
            $levayChast = substr($ciferki, $indexOperator, $indexRavno - $indexOperator);
            
        }
    }

};