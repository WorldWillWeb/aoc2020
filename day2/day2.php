<?php

$input = file_get_contents('day2-data.txt');

$data = explode("\n", $input);
$result1 = 0;
$result2 = 0;

foreach ($data as $key => $value) {
    $dataPart[] = explode(" ",$value);
}
 $countData = count($dataPart);

 for ($i=0; $i < $countData; $i++) { 
    $minAndMax = explode("-",$dataPart[$i][0]);
    $min = $minAndMax[0];
    $max = $minAndMax[1];
    $letter = $dataPart[$i][1][0];
    $password = $dataPart[$i][2];
    $letterPassword = str_split($password);

    $match = 0;
    $position = 0;

    foreach($letterPassword as $key => $char) {
        if ($letter == $char) {
            $match++;
        }
    }

    if ($match >= $min && $match <= $max) {
        $result1++;
    }

    foreach($letterPassword as $key => $char) {
        if ($letter == $char && ($key  == ($max-1) || $key  == ($min-1))) {
            $position++;
        }
    }

    if ($position == 1) {
        $result2++;
    }

 }

 echo '<h1> Etape 1 </h1>';
 echo $result1;

 echo '<h1> Etape 2 </h1>';
 echo $result2;

