<?php
require '../vendor/autoload.php';

$input = file_get_contents('day5-data.txt');

$data = explode("\n", $input);

foreach ($data as $pass) {
    $pass = str_split($pass);
    $minRow = 0;
    $maxRow = 127;
    for ($i=0; $i < 7; $i++) { 
        if ($pass[$i] == 'F') {
            $maxRow = floor($maxRow - (($maxRow - $minRow)/2));
        } else {
            $minRow = ceil($minRow + (($maxRow - $minRow)/2));
        }
    }
    if ($minRow == $maxRow) {
        $row = $minRow;
    }

    $minCol = 0;
    $maxCol = 7;
    for ($i=7; $i < 10; $i++) { 

        if ($pass[$i] == 'L') {
            $maxCol = floor($maxCol - (($maxCol - $minCol)/2));
        } else {
            $minCol = ceil($minCol + (($maxCol - $minCol)/2));
        }
    }

    if ($minCol == $maxCol) {
        $col = $minCol;
    }
    $result[] = $row * 8 + $col;
}

sort($result);
$nbResult = count($result) - 1;

for ($i=0; $i < $nbResult; $i++) { 
    if ($result[$i] + 1 != $result[$i+1]) {
        $result2 = $result[$i]+1;
    }
}

$result1 = max($result);

echo '<h1> Etape 1 </h1>';
echo $result1;

echo '<h1> Etape 2 </h1>';
echo $result2;


