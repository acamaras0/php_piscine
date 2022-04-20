<?php

    require_once("Vertex.class.php");

    class Vector
    {
        private $_x;
        private $_y;
        private $_z;
        private $_w = 0.0;
        static $verbose = false;

        static function doc()
        {
            return (file_get_contents("Vector.doc.txt"));
        }

        public function __construct(array $vect)
        {
            if (isset($vect['orig'])){
                $orig = new Vertex( array('x' => $vect['orig']->getX(), 'y' => $vect['orig']->getY(), 'z' => $vect['orig']->getZ()) );}
            else if (!isset($vect['orig'])){
                $orig = new Vertex( array('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0) );}
            if(isset($vect['dest'])){
                $this->_x = $vect['dest']->getX() - $orig->getX();
                $this->_y = $vect['dest']->getY() - $orig->getY();
                $this->_z = $vect['dest']->getZ() - $orig->getZ();
                $this->_w = 0.0;
            }
            if(self::$verbose)
                printf($this . " constructed\n");
        }
        public function __destruct()
        {
            if(self::$verbose)
                printf($this . " destructed\n");
        }

        public function __toString()
        {
            return ($str = sprintf("Vector( x:%.2f, x:%.2f, x:%.2f, x:%.2f )", 
                    $this->_x, $this->_y, $this->_z, $this->_w ));
        }

        public function magnitude()
        {
            $magn = (float)sqrt($this->_x ** 2 + $this->_y ** 2 + $this->_z ** 2);
            return ($magn); 
        }

        public function normalize()
        {
            $norm = $this->magnitude();
            if ($norm == 1)
                return (clone $this);
            else
                return (new Vector(array('dest' => new Vertex(array('x' => $this->_x / $norm,
                                                                    'y' => $this->_y / $norm,
                                                                    'z' => $this->_z / $norm)))));
        }
        
        public function add(Vector $rhs)
        {
            return (new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->_x,
                                                                'y' => $this->_y + $rhs->_y,
                                                                'z' => $this->_z + $rhs->_z)))));
        }

        public function sub(Vector $rhs)
        {
            return (new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->_x,
                                                                'y' => $this->_y - $rhs->_y,
                                                                'z' => $this->_z - $rhs->_z)))));
        }

        public function opposite()
        {
            return (new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1,
                                                                'y' => $this->_y * -1,
                                                                'z' => $this->_z * -1)))));
        }
        
        public function scalarProduct($k)
        {
             return (new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k,
                                                                 'y' => $this->_y * $k,
                                                                 'z' => $this->_z * $k)))));
        }

        public function dotProduct(Vector $rhs)
        {
            return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
        }
        
        public function crossProduct(Vector $rhs)
        {
            return (new Vector(array('dest' => new Vertex(array('x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
                                                                'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
                                                                'z' => $this->_y * $rhs->getY() - $this->_y * $rhs->getX())))));
        }
        
        public function cos(Vector $rhs)
        {
            return ((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / 
                    sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * 
                    (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
        }

        public function getX()
        {
            return ($this->_x);
        }
        public function getY()
        {
            return ($this->_y);
        }
        public function getZ()
        {
            return ($this->_z);
        }
        public function getW()
        {
            return ($this->_w);
        }
    }
?>