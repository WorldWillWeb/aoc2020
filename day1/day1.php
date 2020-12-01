<?php

include 'day1-data.php';

echo '<h1> Etape 1 </h1>';

foreach($input as $key => $value) { 
    $baseDiff = 2020 - $value;
    if (in_array($baseDiff,$input)) {
        $result = ($value * $baseDiff);
        echo '<p>' .  $value . ' * ' . $baseDiff . ' = ' . $result . '</p>' ;
    };
};

echo '<h1> Etape 2 </h1>';

foreach($input as $key => $value1) { 
    $baseDiff = 2020 - $value1;
    foreach($input as $key => $value2) {
        $newBase = $baseDiff - $value2;
        if (in_array($newBase,$input)) {
            $result = ($value1 * $value2 * $newBase);
            echo '<p>' . $value1 . ' * ' . $value2 . ' * ' . $newBase . ' = ' . $result . '</p>';
        };
    }
};