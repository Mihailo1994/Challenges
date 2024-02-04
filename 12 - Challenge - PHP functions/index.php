<?php


function decimalToBinary($number){
    if (is_int($number)) {
        $binaryReverse = '';
        while ($number >= 1){
            if ($number % 2 == 0 ) {
                $binaryReverse .= 0;
            } else {
               $binaryReverse .= 1;
            }
            $number = floor($number / 2);
        }
        $binary = strrev($binaryReverse);
        return $binary;
    } else {
        echo 'Enter decimal number';
    }
    
}

// decimalToBinary();
// echo decimalToBinary();

echo '<hr>';

function decimalToRoman($number){
    if (is_int($number)){
            $roman = '';
        if ($number > 3999) {
            echo 'The decimal number is larger than 3999 <br>';
        } else {
            while ($number >= 1000 ) {
                $roman .= 'M';
                $number = $number - 1000;
            }
            while ($number >= 900 && $number < 1000) {
                $roman .= 'CM';
                $number = $number - 900;
            }
            while ($number >= 500 && $number < 900) {
                $roman .= 'D';
                $number = $number - 500;
            }
            while ($number >= 400 && $number < 500) {
                $roman .= 'CD';
                $number = $number - 400;
            }
            while ($number >= 100 && $number < 400) {
                $roman .= 'C';
                $number = $number - 100;
            }
            while ($number >= 90 && $number < 100) {
                $roman .= 'XC';
                $number = $number - 90;
            }
            while ($number >= 50 && $number < 90) {
                $roman .= 'L';
                $number = $number - 50;
            }
            while ($number >= 40 && $number < 50) {
                $roman .= 'XL';
                $number = $number - 40;
            }
            while ($number >= 10 && $number < 40) {
                $roman .= 'X';
                $number = $number - 10;
            }
            while ($number >= 9 && $number < 10) {
                $roman .= 'IX';
                $number = $number - 9;
            }
            while ($number >= 5 && $number < 9) {
                $roman .= 'V';
                $number = $number - 5;
            }
            while ($number >= 4 && $number < 5) {
                $roman .= 'IV';
                $number = $number - 4;
            }
            while ($number >= 1 && $number < 4) {
                $roman .= 'I';
                $number = $number - 1;
            }
            return $roman;
        }
    } else {
        echo 'enter decimal number';
    }
    
}   

function decimalToRomanNew($number) {
    $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
    return $returnValue;        
}

// echo decimalToRoman(3458);

echo '<hr>';

function romanToDecimal($roman){
    $romans = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];
    $roman = strtoupper($roman);
    $result = 0;
    $tmp2 = 1000;
    $tmp = 0;
    for ($i = 0; $i < strlen($roman); $i++){
        foreach ($romans as $key => $value) {
            if ($roman[$i] == $key) {
                $tmp = $value;
                $result += $value;
            }
        }
        if ($tmp < $tmp2) {
            $tmp2 = $tmp;
        } elseif ($tmp > $tmp2){
            $result += (- $tmp2 - $tmp2);
            $tmp2 = $tmp;
        }
    }
    
    return $result;
}
 
// romanToDecimal('MCDLVII');
// echo romanToDecimal('MCDLVII');

echo '<hr>';

function binaryToDecimal($binary) {
    $binaryString = strval($binary);
    $decimal = 0;
    for ($i = 0, $k = strlen($binary)-1; $i < strlen($binary), $k >= 0; $i++, $k--) {
        $decimal += $binaryString[$i] * (2**$k);
    }
    return $decimal;
}

// binaryToDecimal(1010111);
// echo binaryToDecimal(1010111);

echo '<hr>';

// $number = 'MMCM';
// $number = 110101001;
// $number = +1234;
// $number = '+02145';
function checkNumber($number) {
    $number = strval($number);

    if (preg_match('/^[+-]/', $number) && $number[1] == '0') {
        echo 'error';
    } elseif (preg_match('/[A-Z]/', $number)){
        if (preg_match('/[ABEFGHJKNOPQRSTUWYZ]/', $number)){
            echo 'Wrong Roman number';
        } else {
            echo 'The number is roman. <br>The decimal number is:'. ' '. romanToDecimal($number) . '<br>' .'The binary number is:'.' '. decimalToBinary(romanToDecimal($number)). '<br>';
        }
    } elseif (preg_match('/[0-1]/', $number) && !preg_match('/[2-9]/', $number)) {
        $number = intval($number);
        echo 'The number is binary. <br>The decimal number is:'. ' '. binaryToDecimal($number) . '<br>' .'The roman number is:'.' '. decimalToRoman(binaryToDecimal($number)). '<br>';
    } elseif (preg_match('/^[+-]/', $number) || preg_match('/[0-9]/', $number)) {
        $number = intval($number);
        echo 'The number is decimal. <br>The roman number is:'. ' '. decimalToRoman($number) . '<br>' .'The binary number is:'.' '. decimalToBinary($number) . '<br>';
    }
}

// checkNumber('MMCM');

echo '<hr>';

function decimalToRomanIncreased($number){
    $romanLarge = '';
    $roman = '';
    if ($number > 3999999) {
        echo 'Error';
    } else {
        while ($number >= 1000000 ) {
            $romanLarge .= 'M';
            $number = $number - 1000000;
        }
        while ($number >= 900000 && $number < 1000000) {
            $romanLarge .= 'CM';
            $number = $number - 900;
        }
        while ($number >= 500 && $number < 900) {
            $romanLarge .= 'D';
            $number = $number - 500000;
        }
        while ($number >= 400000 && $number < 500000) {
            $romanLarge .= 'CD';
            $number = $number - 400;
        }
        while ($number >= 100000 && $number < 400000) {
            $romanLarge .= 'C';
            $number = $number - 100000;
        }
        while ($number >= 90000 && $number < 100000) {
            $romanLarge .= 'XC';
            $number = $number - 90000;
        }
        while ($number >= 50000 && $number < 90000) {
            $romanLarge .= 'L';
            $number = $number - 50000;
        }
        while ($number >= 40000 && $number < 50000) {
            $romanLarge .= 'XL';
            $number = $number - 40000;
        }
        while ($number >= 10000 && $number < 40000) {
            $romanLarge .= 'X';
            $number = $number - 10000;
        }
        while ($number >= 9000 && $number < 10000) {
            $romanLarge .= 'IX';
            $number = $number - 9000;
        }
        while ($number >= 5000 && $number < 9000) {
            $romanLarge .= 'V';
            $number = $number - 5000;
        }
        while ($number >= 4000 && $number < 5000) {
            $romanLarge .= 'IV';
            $number = $number - 4000;
        }
        while ($number >= 1000 ) {
            $roman .= 'M';
            $number = $number - 1000;
        }
        while ($number >= 900 && $number < 1000) {
            $roman .= 'CM';
            $number = $number - 900;
        }
        while ($number >= 500 && $number < 900) {
            $roman .= 'D';
            $number = $number - 500;
        }
        while ($number >= 400 && $number < 500) {
            $roman .= 'CD';
            $number = $number - 400;
        }
        while ($number >= 100 && $number < 400) {
            $roman .= 'C';
            $number = $number - 100;
        }
        while ($number >= 90 && $number < 100) {
            $roman .= 'XC';
            $number = $number - 90;
        }
        while ($number >= 50 && $number < 90) {
            $roman .= 'L';
            $number = $number - 50;
        }
        while ($number >= 40 && $number < 50) {
            $roman .= 'XL';
            $number = $number - 40;
        }
        while ($number >= 10 && $number < 40) {
            $roman .= 'X';
            $number = $number - 10;
        }
        while ($number >= 9 && $number < 10) {
            $roman .= 'IX';
            $number = $number - 9;
        }
        while ($number >= 5 && $number < 9) {
            $roman .= 'V';
            $number = $number - 5;
        }
        while ($number >= 4 && $number < 5) {
            $roman .= 'IV';
            $number = $number - 4;
        }
        while ($number >= 1 && $number < 4) {
            $roman .= 'I';
            $number = $number - 1;
        }
    }
    echo "<div><span style='text-decoration: overline;'>$romanLarge</span>$roman</div>";
} 

// echo decimalToRomanIncreased(354788);

echo '<hr>';

$a = [678, 'LIII', 817, 110101, 1001100, 1110001, 'XXVIII', 392, 'CXCIV', 'MMXIX'];

function convertingNumbers($array){
    for ($i = 0; $i < count($array); $i++) {
        $number = strval($array[$i]);
    
        if (preg_match('/^[+-]/', $number) && $number[1] == '0') {
            echo 'error';
        } elseif (preg_match('/[A-Z]/', $number)){
            if (preg_match('/[ABEFGHJKNOPQRSTUWYZ]/', $number)){
                echo 'Wrong Roman number <hr>';
            } else {
            echo 'Roman:' . ' ' . $number . '<br>' . ' Decimal:' . ' ' . romanToDecimal($number) . '<br>' . 'Binary:' . ' ' . decimalToBinary(romanToDecimal($number)) . '<hr>'; }
        } elseif (preg_match('/[0-1]/', $number) && !preg_match('/[2-9]/', $number)) {
            $number = intval($number);
            echo 'Binary:'.' '.$number.'<br>'.' Decimal:'.' '. binaryToDecimal($number).'<br>'.'Roman:' . ' ' . decimalToRoman(binaryToDecimal($number)) . '<hr>';
        } elseif (preg_match('/^[+-]/', $number) || preg_match('/[0-9]/', $number)) {
            $number = intval($number);
            echo 'Decimal:' . ' ' . $number . '<br>' . 'Roman:'. ' ' . decimalToRoman($number) . '<br>' .'Binary:'.' '. decimalToBinary($number) . '<hr>';
        }
    }
}

// convertingNumbers();


?>
