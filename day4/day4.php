<?php

$result = 0;

// Step 2 : if field is valid
function checkField(String $field, $value) {
    switch ($field) {
        case 'byr':
            if (preg_match("/^(\d{4})$/", $value) === 1 && ($value >= 1920 && $value <= 2002)) {
                return true;
            } else {
                return false;
            }
        break;

        case 'iyr':
            if (preg_match("/^(\d{4})$/", $value) == 1 && ($value >= '2010' && $value <= '2020')) {
                return true;
            } else {
                return false;
            }
        break;

        case 'eyr':
            if (preg_match("/^(\d{4})$/", $value) == 1 && ($value >= '2020' && $value <= '2030')) {
                return true;
            } else {
                return false;
            }
        break;

        case 'hgt':
            $typehgt = substr($value, -2, 2);
            switch ($typehgt) {
                case 'cm':
                    $value = substr($value, 0, 3);
                    if (preg_match("/^(\d{3})$/", $value) == 1 && ($value >= '150' && $value <= '193')) {
                        return true;
                    } else {
                        return false;
                    }
                break;
                case 'in':
                    $value = substr($value, 0, 2);
                    if (preg_match("/^(\d{2})$/", $value) == 1 && ($value >= '59' && $value <= '76')) {
                        return true;
                    } else {
                        return false;
                    }
                break;
                default:
                return false;
            }
        break;

        case 'hcl':
            if (preg_match("/^#[0-9a-f]{6}$/", $value) === 1) {
                return true;
            } else {
                return false;
            }
        break;

        case 'ecl':
            if (preg_match("/^amb|blu|brn|gry|grn|hzl|oth$/", $value) == 1) {
                return true;
            } else {
                return false;
            }
        break;

        case 'pid':
            if (preg_match("/^[0-9]{9}$/", $value) == 1) {
                return true;
            } else {
                return false;
            }
        break;

        case 'cid':
                return true;
        break;

        default:
            return false;
    }
}

$input = file_get_contents('day4-data.txt');

$data = explode("\n\n", $input);

foreach ($data as $key => $scan) {

    $listCode = [
        "byr" => false,
        "iyr" => false,
        "eyr" => false,
        "hgt" => false,
        "hcl" => false,
        "ecl" => false,
        "pid" => false,
        "cid" => true,
        ];

    $fields[$key] = explode(" ",(str_replace("\n", " ", $scan)));

    foreach ($fields[$key] as $code => $content) {
        
        $fieldCode = strstr($content, ':', true);
        $feldContent = substr($content, strpos($content, ":") + 1);

        $listCode[$fieldCode] = checkField($fieldCode,$feldContent);
    }

    if (count(array_unique($listCode)) === 1) {
        $result++;
    }
}

echo $result;
