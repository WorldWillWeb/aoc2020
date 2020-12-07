<?php
require '../vendor/autoload.php';

$input = file_get_contents('day6-data.txt');

$data = explode("\n\n", $input);

$alphabet = str_split('abcdefghijklmnopqrstuvwxyz');

foreach ($data as $key => $value) {
    $group[$key] = $value;
}

foreach ($group as $key => $questionsYes) {
    foreach ($alphabet as $letter) {
        $question[$letter] = false;
    }
    $questionsYes = str_split($questionsYes);
    foreach ($questionsYes as $yes) {
        if (key_exists($yes,$question)) {
            $question[$yes] = true;
        }
    }
    foreach ($question as $value)  {
        if ($value === true) {
            $result1++;
        }
    }
}


echo '<h1> Etape 1 </h1>';
echo $result1;

echo '<h1> Etape 2 </h1>';


