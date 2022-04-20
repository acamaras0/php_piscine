<?php
    require_once("Color.class.php");
    class Vertex
    {
        private $_x;
        private $_y;
        private $_z;
        private $_w = 1.0;
        private $_color;
        static $verbose = false;

        static function doc()
        {
            return (file_get_contents("Vertex.doc.txt"));
        }

        public function __construct(array $xyzw)
        {
            if (isset($xyzw['x']) && isset($xyzw['y']) && isset($xyzw['z']))
            {
                $this->_x = $xyzw['x'];
                $this->_y = $xyzw['y'];
                $this->_z = $xyzw['z'];
            }
            if (isset($xyzw['color']))
                $this->_color = $xyzw['color'];
            else
                $this->_color = new Color(array('red' => 255, 'green' =>255, 'blue' => 255));
            if (isset($xyzw['w']))
                $this->_w = $xyzw['w'];
            if (self::$verbose)
                printf($this." constructed\n");
        }

        function __destruct()
        {
            if (self::$verbose)
                printf($this . " destructed\n");
        }

        function __toString()
        {
            if(self::$verbose)
            {
                return ($str = sprintf("Vertex(x: %.2f, y: %.2f, z:%.2f, w:%.2f, $this->_color )", 
                                $this->_x, $this->_y, $this->_z, $this->_w) );
            }
            else
            {
            return ($str = sprintf("Vertex(x: %.2f, y: %.2f, z:%.2f, w:%.2f )", 
                            $this->_x, $this->_y, $this->_z, $this->_w) );
            }
        }
        public function getX()
        {
            return ($this->_x);
        }
        public function setX($x)
        {
            $this->_x = $x;
        }

        public function getY()
        {
            return ($this->_y);
        }
        public function setY($y)
        {
            $this->_y = $y;
        }

        public function getZ()
        {
            return ($this->_z);
        }
        public function setZ($z)
        {
            $this->_z = $z;
        }

        public function getW()
        {
            return ($this->_w);
        }
        public function setW($w)
        {
            $this->_w = $w;
        }

        public function getColor()
        {
            return ($this->_color);
        }
        public function setColor($color)
        {
            $this->_color = $color;
        }
    }
?>