<?php
require '../vendor/autoload.php';

$input = file_get_contents('day6-data.txt');

$data = explode("\n\n", $input);

$alphabet = str_split('abcdefghijklmnopqrstuvwxyz');

$nbLine = [];

foreach ($data as $groupkey => $value) {
    $group[$groupkey] = $value;
}

foreach ($group as $key => $questionsYes) {
    $listQuestionYes = explode("\n", $questionsYes);
    $nbLine[$key] = count($listQuestionYes);
    
    foreach ($alphabet as $letter) {
        $question[$letter] = false;
    }
    $questionsYes = str_split($questionsYes);
    $groupYes = [];
        
    foreach ($questionsYes as $yes) {
        
        if (key_exists($yes,$question)) {
            $question[$yes] = true;
        }

        if (!in_array($yes,$groupYes) && key_exists($yes,$question))  {
            $groupYes[$key][] = $yes;
        }
    }
    foreach ($question as $value)  {
        if ($value === true) {
            $result1++;
        }
    }

    $listValues = array_count_values($groupYes[$key]);

      
    
    foreach ($listValues as $response) {
        if ($response == $nbLine[$key]) {
            $result2++;
        }
    }
}


echo '<h1> Etape 1 </h1>';
echo $result1;

echo '<h1> Etape 2 </h1>';
echo $result2;


