<?php

$string = "10 * 5";
$found = false;
$positionOfStar = -1;
$explodedString = [];

for ($i = 0 ; $i < strlen($string) ; $i++) {
    if ($string{$i} == "*") {
        $found = true;
        $positionOfStar = $i;
        $explodedString = explode("*", $string);
        for ($i = 0 ; $i < sizeof($explodedString) ; $i++) {
            $explodedString[$i] = trim($explodedString[$i]);
        }

    }
}





