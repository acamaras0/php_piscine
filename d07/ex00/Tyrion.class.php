<?php
    class Tyrion extends Lannister
    {
        public function __construct()
        {
            parent::__construct();
            printf("My name is Tyrion\n");
        }
        public function getSize()
        {
            printf("Short");
        }
    }
?>