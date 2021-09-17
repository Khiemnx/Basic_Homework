<?php 
    class Queue {
        /** @var array queue element */
        private $elements;
    
        public function __construct()
        {
            $this->elements = array(); //initialize queue element
        }
    
        /**
        * insert an element
        * @param int $num
        * @return void
        */
        public function enqueue($num)
        {
            array_unshift($this->elements, $num); //array_unshift: Prepend one or more elements to the beginning of an array (https://www.php.net/manual/en/function.array-unshift.php)
        }
    
        /**
        * delete front element
        * @return void
        */
        public function dequeue()
        {
            if (!$this->isEmpty()) { //check if queue is not empty
                unset($this->elements[sizeof($this->elements) - 1]); // same to pop function in stack
            }        
        }
    
        /**
        * get front element
        * @return int
        */
        public function front()
        {
            if (!$this->isEmpty()) {
                return $this->elements[sizeof($this->elements) - 1]; // same to top function in stack
            }
        
            return null;        
        }
    
        /**
        * check queue is empty or not
        * @return boolean
        */
        public function isEmpty()
        {
            return empty($this->elements);
        }
    }

    //-----------------------------------------HOMEWORK 1--------------------------------------


    class SolveProblem {
        /** @var int */
        private $num;
        /** @var Queue */
        private $priorityTask;
        /** @var array */
        private $dependentList;

        /**
        * constructor
        * @param int $num
        * @param Queue $priorityTask
        * @param array $dependentList
        */
        public function __construct($num, $priorityTask, $dependentList) 
        {
            $this->num = $num;
            $this->priorityTask = $priorityTask;
            $this->dependentList = $dependentList;
        }

        /**
        * get the time taken to process these tasks
        * @return int
        */
        public function getTimeTaken() 
        {
            /** @var int */
            $timeTaken = 0;
            /** @var int */
            $processedTask = 0;

            while ($processedTask < $this->num) {
                $currentTask = $this->priorityTask->front();

                if ($currentTask === $this->dependentList[$processedTask]) { //process task and remove it from list
                    $this->priorityTask->dequeue();
                    $timeTaken += 2;
                    $processedTask++;
                }
                else { //push the task to the last of priority list
                    $timeTaken += 1;
                    $this->priorityTask->enqueue($currentTask);
                    $this->priorityTask->dequeue();
                }
            }
            return $timeTaken;
        }
    }

    $N = 3;

    $priorityTask = new Queue();
    $priorityTask->enqueue(2);
    $priorityTask->enqueue(1);
    $priorityTask->enqueue(3);

    $dependentList = array(1, 2, 3);

    $solveProblem = new SolveProblem($N, $priorityTask, $dependentList);
    echo "Time taken : " . $solveProblem->getTimeTaken();

   

?>
