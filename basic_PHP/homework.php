<?php 
//--------------------Homework 1------------------------

$sum = 0;
for ($i = 0 ; $i <= 50 ; $i++) {
    if ($i % 2 == 1) {
        $sum += $i;
    }
}

echo "the sum of the odd numbers between 0 to 50: " . $sum . "<br>";

///////

//--------------------Homework 2------------------------

function factorialOfNumber($n)
{
    $result = 1;
    for($i = 1; $i < $n + 1; $i++) {
        $result *= $i;
    }
    return $result;
}

echo factorialOfNumber(10) . "<br>";

//////

//--------------------Homework 3------------------------

function isPrimeNumber($inputNumber)
{
    if ($inputNumber < 2) {
        return false;
    }
    if ($inputNumber === 2) {
        return true;
    }
    if ($inputNumber % 2 == 0) {
        return false;
    }
    for ($i = 3; $i < $inputNumber / 2; $i += 2) {
        if ($inputNumber % $i == 0) {
            return false;
        }
    }
    return true;
}

////////

//--------------------Homework 4------------------------
//Use function from Homework 3

function getPrimeNumberInRange($n) 
{
    $arr = array();
    while ($n > 1) {
        if (isPrimeNumber($n)) {
            array_push($arr, $n);
        }
        $n--;
    }
    return $arr;
}

var_dump(getPrimeNumberInRange(100));

/////////
