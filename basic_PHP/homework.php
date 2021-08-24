<?php 

// $a = array(6, 2, 5, 10, 11, 1, 17, 20);
// sort($a);
// echo "Min=".$a[0]."<br>";
// rsort($a);
// echo "Max=".$a[0];

//--------------------Homework 1------------------------
$sum = 0;
$number = 0;
while($number <= 50) {
    if($number % 2 == 1) $sum +=$number;
    $number++;
};
echo "the sum of the odd numbers between 0 to 50: ".$sum."<br>";

///////

//--------------------Homework 2------------------------
function factorialOfNumber($n)
{
    $result = 1;
  // Write your source code here
    for($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

echo factorialOfNumber(10)."<br>";

//////

//--------------------Homework 3------------------------

function check_PrimeNumber($inputNumber){
    if($inputNumber > 2) {
        for($i = 2 ; $i < $inputNumber/2 ; $i++) {
            if($inputNumber%$i==0) return false;
        }
    }
    return true;
};

// $arr = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97);
// foreach($arr as $x) {
//     echo check_PrimeNumber($x)."<br>";
// }

////////

//--------------------Homework 4------------------------
//Use function from Homework 3
function PrimeNumber_inRange($n) {
    while($n > 1) {
        if(check_PrimeNumber($n)) echo $n."<br>";
        $n--;
    }
}

//PrimeNumber_inRange(100);

/////////
