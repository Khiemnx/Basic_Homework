<?php 
    //------------------------------HOMEWORK 1----------------------------------

    class SimpleArray {
        public $arr;
        public function __construct($arr)
        {
            $this->arr = $arr;
        }
        public function sum() {
            return array_sum($this->arr);
        }
        public function average() {
            return $this->sum() / count($this->arr);
        }
        public function min() {
            $cpyArr = $this->arr;
            sort($cpyArr);
            return $cpyArr[0];
        }
        public function max() { 
            $cpyArr = $this->arr;
            rsort($cpyArr);
            return $cpyArr[0];
        }
        public function output() {
            echo "<br>-sum: " . $this->sum()
            . "<br>-average: " . $this->average() 
            . "<br>-min: " . $this->min() 
            . "<br>-max: " . $this->max() . "<br>";
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
    $arrC = array_map(function () 
    {
        return array_sum(func_get_args());
    }, $arrA, $arrB);
    var_dump($arrC);
    echo "<br><br>";
    
    ////////////////////////////////////////////////////////////////////////

    //------------------------------HOMEWORK 3-----------------------------------
    
    class TwoDArray extends SimpleArray {
        public $row;
        public $col;
        public function __construct($arr)
        {
            $this->arr = $arr;
            $this->row = count($arr);
            $this->col = count($arr[0]);
        }
        public function sum()
        {
            $sum = 0;
            foreach ($this->arr as $x) {
                $sum += array_sum($x);
            }
            return $sum;
        }
        public function average()
        {
            return $this->sum() / ($this->row * $this->col);
        }
        public function min()
        {
            $minEachRow = array();
            foreach ($this->arr as $row) {
                sort($row);
                array_push($minEachRow, $row[0]);
            }
            sort($minEachRow);
            return $minEachRow[0];
        }
        public function max()
        {
            $maxEachRow = array();
            foreach ($this->arr as $row) {
                rsort($row);
                array_push($maxEachRow, $row[0]);
            }
            rsort($maxEachRow);
            return $maxEachRow[0];
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