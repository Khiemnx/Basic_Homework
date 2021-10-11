<?php
    /**
    * A node of Binary Tree (BT)
    */
    class Node {
        /** @var int */
        private $data;

        /** @var Node left subtree */
        private $left;

        /** @var Node right subtree */
        private $right;

        public function __construct($data, $left = null, $right = null)
        {
            $this->data = $data;
            $this->left = $left;
            $this->right = $right;
        }

        /**
        * get data
        * @return int
        */
        public function getData()
        {
            return $this->data;
        }

        /**
        * set data
        * @param int $data
        */
        public function setData($data)
        {
            $this->data = $data;
        }

        /**
        * get left
        * @return Node
        */
        public function getLeft()
        {
            return $this->left;
        }

        /**
        * set left
        * @param Node $left
        */
        public function setLeft($left)
        {
            $this->left = $left;
        }

        /**
        * get right
        * @return Node
        */
        public function getRight()
        {
            return $this->right;
        }

        /**
        * set right
        * @param Node $right
        */
        public function setRight($right)
        {
            $this->right = $right;
        }
    }

    /**
    * Binary Tree Class
    */
    class BinaryTree {
        /** @var Node */ 
        protected $root;

        public function __construct($root = null)
        {
            $this->root = $root;
        }

        public function isEmpty() 
        {
            return $this->root === null;
        }

        /**
        * get root
        * @return Node
        */
        public function getRoot()
        {
            return $this->root;
        }

        /**
        * set root
        * @param Node $root
        */
        public function setRoot($root)
        {
            $this->root = $root;
        }

        public function traverse($method) 
        {
            switch ($method) {
                case 'inorder':
                $this->_inorder($this->root);
                break;
        
                case 'postorder':
                $this->_postorder($this->root);
                break;
        
                case 'preorder':
                $this->_preorder($this->root);
                break;
        
                default:
                break;
            } 
        
        } 
        
        private function _inorder($node) 
        {
        
            if ($node->getLeft()) {
                $this->_inorder($node->getLeft()); 
            } 
        
            echo $node->getData() . " ";
        
            if ($node->getRight()) {
                $this->_inorder($node->getRight()); 
            } 
        }

        private function _preorder($node) 
        {
        
            echo $node->getData() . " ";
        
            if ($node->getLeft()) {
                $this->_preorder($node->getLeft()); 
            } 
        
        
            if ($node->getRight()) {
                $this->_preorder($node->getRight()); 
            } 
        }

        private function _postorder($node) 
        {
        
            if ($node->getLeft()) {
                $this->_postorder($node->getLeft()); 
            } 
        
        
            if ($node->getRight()) {
                $this->_postorder($node->getRight()); 
            } 
        
            echo $node->getData() . " ";
        }

        /**
        * insert the key into the binary tree at first position available in level order
        * @param int $data
        * @return void
        */
        public function insertFirstLevel($data) {
            if ($this->root == NULL) {

                $this->root = new Node($data);
                return;
            }
            $traverseByWidth = new Queue();
            $current = $this->root;
            $data = new Node($data);

            $traverseByWidth->enqueue($current);

            while(true) {
                if (!$current->getLeft()) {
                    $current->setLeft($data);
                    return;
                }
                if (!$current->getRight()) {
                    $current->setRight($data);
                    return;
                }
                $traverseByWidth->enqueue($current->getLeft());
                $traverseByWidth->enqueue($current->getRight());
                $traverseByWidth->dequeue();
                $current = $traverseByWidth->front();
            }
        }
    }

    class SearchBinaryTree extends BinaryTree {

        /**
        * insert the key into the binary search tree 
        * @param int $data
        * @return void
        */
        public function insert($data) 
        {
                
            if ($this->root == NULL) {

                $this->root = new Node($data);
                return;
            }
            $current = $this->root;

            while ($data !== $current->getData()) {
                if ($data < $current->getData()) {
                    
                    if ($current->getLeft()) {
                        $current = $current->getLeft();
                    } else {
                        $current->setLeft(new Node($data));
                        break; 
                    }
                } else {
                    if ($current->getRight()) {
                        $current = $current->getRight();
                    } else {
                        $current->setRight(new Node($data));
                        break; 
                    }
                }
            } 		
        }

        /**
        * get min value at the binary search tree 
        * @return int
        */
        public function getMin() 
        {
            if ($this->root == NULL) {
                return;
            }
            $current = $this->root;
            while($current->getLeft()) {
                $current = $current->getLeft();
            }
            return $current->getData();
        }

        /**
        * get max value at the binary search tree 
        * @return int
        */
        public function getMax() 
        {
            if ($this->root == NULL) {
                return;
            }
            $current = $this->root;
            while($current->getRight()) {
                $current = $current->getRight();
            }
            return $current->getData();
        }
    }

    class Queue {
        /** @var array queue element */
        private $elements;

        public function __construct()
        {
            $this->elements = array(); //initialize queue element
        }

        /**
        * insert an element
        * @param Node $num
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
        * @return Node
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

    //--------------------Homework 1------------------------
    
    $inputArr = array(10, 5, 19, 1 ,6, 17);
    $searchTree = new SearchBinaryTree();
    for ($i = 0, $n=count($inputArr); $i < $n; $i++) {
        $searchTree->insert($inputArr[$i]);
    }
    echo "Minimum value : ";
    echo $searchTree->getMin();
    echo "<br>" . "Maximum value : ";
    echo $searchTree->getMax();
    echo "<br><br>";

    ///////////////////////////////////////////////////////////////

    //--------------------Homework 2------------------------

    $left1 = new Node(7);
    $left2 = new Node(15);
    $right2 = new Node(8);

    $parrent1 = new Node(11, $left1);
    $parrent2 = new Node(9, $left2, $right2);

    $root = new Node(10, $parrent1, $parrent2);

    $binTree = new BinaryTree($root);
    echo "Traverse inorder before insert : ";
    $binTree->traverse('inorder');
    $binTree->insertFirstLevel(12);
    echo "<br>" . "Traverse inorder after insert : ";
    $binTree->traverse('inorder');
?>