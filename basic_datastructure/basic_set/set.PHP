<?php 
    class Set {
        /** @var array */
        private $elements;
    
        /**
        * constructor
        */
        public function __construct()
        {
            $this->elements = array();
        }
    
        /**
        * add element to set
        * @param int $ele
        */
        public function add($ele)
        {
            if (!$this->isExist($ele)) { // we have to check if element is existed before adding
                $this->elements[] = $ele; // because the order is any so we can add to the end or beginning
            }
        }
    
        /**
        * get set
        * @return array
        */
        public function get()
        {
            return $this->elements;
        }
    
    
        /**
        * check if element is exist in set
        * @param int $ele
        * @return bool
        */
        public function isExist($ele)
        {
            return in_array($ele, $this->elements); // In php, in_array use to check an element is in array or not
        }
    }
    
    //-------------------------------HOMEWORK 1------------------------------

    $set1 = new Set();
    $inputArray1 =  array(1, 2, 3, 4, 5, 2, -1, 5, 2, 7, 11, 11, -5);

    addInput($inputArray1, $set1);
    print_r($set1->get());
    echo "<br><br>";

    //////////////////////////////////////////////////////////////////////

    //-------------------------------HOMEWORK 2------------------------------

    class EngSet extends Set {

        public function add($ele)
        {
            $ele = ucfirst($ele);
            parent::add($ele);
        }
    }

    $engSet = new EngSet();
    $inputArray2a = array('Hello', 'Hi', 'Good morning', 'Good night');
    $inputArray2b = array('Hello', 'Hi', 'Good morning', 'Good night', 'Name', 'Age');
    $inputArray2c = array('Hello', 'Hi', 'Good morning', 'Good night', 'Name', 'Age', 'How are you', 'Fine', 'Thank');

    /**
    * add all elements of an array into a set
    * @param array $arr
    */
    function addInput($arr, $set) 
    {
        foreach ($arr as $element) {
            $set->add($element);
        }
    }

    addInput($inputArray2a, $engSet);
    print_r($engSet->get());
    echo "<br>";

    addInput($inputArray2b, $engSet);
    print_r($engSet->get());
    echo "<br>";

    addInput($inputArray2c, $engSet);
    print_r($engSet->get());
    echo "<br>";
?>