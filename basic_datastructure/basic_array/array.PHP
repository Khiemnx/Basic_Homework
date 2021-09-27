<?php 
    //------------------------------HOMEWORK 1----------------------------------

    class SimpleArray {
        /** @var array */
        public $arr;

        /**
        * constructor
        * @param array $arr
        */
        public function __construct($arr)
        {
            $this->arr = $arr;
        }

        /**
        * print the average, sum, min and max of elements in array
        * @return void
        */
        public function output() 
        {
            $cpyArr = $this->arr;
            sort($cpyArr);
            $sum = array_sum($cpyArr);
            $countArr = count($cpyArr);
            $average = $sum / $countArr;

            echo "<br>-sum: " . $sum
            . "<br>-average: " . $average 
            . "<br>-min: " . $cpyArr[0] 
            . "<br>-max: " . $cpyArr[$countArr - 1] . "<br>";
        }
    }

    $arr1 = new SimpleArray(array(5, 12, 17, 9, 3));
    $arr2 = new SimpleArray(array(13, 4, 8, 14, 1));
    $arr3 = new SimpleArray(array(9, 5, 3, 7, 21));
    $arr1->output();
    $arr2->output();
    $arr3->output();

    /////////////////////////////////////////////////////////////////////////

    //------------------------------HOMEWORK 2----------------------------------

    $arrA = array(1, 2, 3, 4, 5);
    $arrB = array(4, 5, 3, 2, 10);
    $arrC = array();
    for ($i = 0; $i < count($arrA); $i++) {
        array_push($arrC, $arrA[$i] + $arrB[$i]);
    }
    var_dump($arrC);
    echo "<br><br>";
    
    ////////////////////////////////////////////////////////////////////////

    //------------------------------HOMEWORK 3-----------------------------------
    
    class TwoDArray extends SimpleArray {     

        public function __construct($arr)
        {
            $this->arr = $arr;
        }

        public function output()
        {
            $simpleArr = array();
            foreach ($this->arr as $element) {
                $simpleArr = array_merge($simpleArr, $element);
            }
            $this->arr = $simpleArr;
            parent::output();
        }
    }
 
    $arrayNxM = array(
        array(5, 12, 17, 9, 13),
        array(13, 4, 8, 14, 1),
        array(9, 5, 3, 17, 21)
    );
    $input2DArr = new  TwoDArray($arrayNxM);
    echo $input2DArr->output();

?>
