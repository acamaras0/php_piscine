<?php

class Color
{
    public $red;
    public $green;
    public $blue;
    static $verbose = false;

    function __construct(array $kwargs)
    {
        if (isset($kwargs['rgb']))
        {
            $this->red = $kwargs['rgb'] >> 16 & 0xFF;
            $this->green = $kwargs['rgb'] >> 8 & 0xFF;
            $this->blue = $kwargs['rgb'] & 0xFF;
        }
        else if (isset($kwargs['red']) && isset($kwargs['blue']) && isset($kwargs['green']))
        {
            $this->red = intval($kwargs['red']);
            $this->green = intval($kwargs['green']);
            $this->blue = intval($kwargs['blue']);
        }
        if (self::$verbose)
            printf($this . " constructed.\n");
    }

    function __destruct()
    {
        if (self::$verbose)
            printf($this . " destructed.\n");
    }

    function __toString()
    {
        $str = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
        return ($str);
    }

    static function doc()
    {
        return (file_get_contents("Color.doc.txt"));
    }

    function add(Color $add)
    {
        $newred = $this->red + $add->red;
        $newgreen = $this->green + $add->green;
        $newblue = $this->blue + $add->blue;
        $newcolor = array("red" => $newred, "green" => $newgreen, "blue" => $newblue);
        return (new Color($newcolor));
    }

    function sub(Color $sub)
    {
        $newred = $this->red - $sub->red;
        $newgreen = $this->green - $sub->green;
        $newblue = $this->blue - $sub->blue;
        $newcolor = array("red" => $newred, "green" => $newgreen, "blue" => $newblue);
        return (new Color($newcolor));
    }

    function mult($mult)
    {
        $newred = $this->red * $mult;
        $newgreen = $this->green * $mult;
        $newblue = $this->blue * $mult;
        $newcolor = array("red" => $newred, "green" => $newgreen, "blue" => $newblue);
        return (new Color($newcolor));
    }
}
?>