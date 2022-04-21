<?php
    abstract class Fighter
    {
        public $name;
        public function __construct($n)
        {
            $this->name = $n;
        }
        public function getName()
        {
            return $this->name;
        }
        abstract public function fight($n);
    }

?>