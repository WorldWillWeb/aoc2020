<?php

function countTrees(int $jumpX, int $jumpY):int {
    $input = file_get_contents('day3-data.txt');

    $data = explode("\n", $input);

    $mapTree = '#';
    $mapOpen = '.';
    $tree = 0;

    $baseNbChar = strlen($data[0]);
    $nbLine = count($data) + 1;
    $minJump = 0;
    $maxJump = floor($baseNbChar / $jumpX);

    $previous = $data[0][0];
    $positionX = 0;

    for ($i=0; $i <= $nbLine; $i += $jumpY) { 
    if($previous == $mapTree) {
            $tree++;
        }

        $minJump++;

        if ($minJump < $maxJump) {
            $positionX += $jumpX;
            $previous = $data[$i+$jumpY][$positionX];
        } else {
            $positionX = ($positionX+ $jumpX) - $baseNbChar;
            $minJump = (floor($positionX / $jumpX) );
            $previous = $data[$i+$jumpY][$positionX];
        }
    }
    return $tree;
}

echo '<h1> Etape 1 </h1>';
echo countTrees(3,1);

echo '<h1> Etape 2 </h1>';
$slopes1 = countTrees(1,1);
$slopes2 = countTrees(3,1);
$slopes3 = countTrees(5,1);
$slopes4 = countTrees(7,1);
$slopes5 = countTrees(1,2);

$result = $slopes1*$slopes2*$slopes3*$slopes4*$slopes5;
echo $slopes1 . '*' . $slopes2 . '*' . $slopes3 . '*' . $slopes4 . '*' . $slopes5 . '=' . $result;