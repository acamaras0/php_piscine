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
            $color = intval($kwargs['rgb']);
            $this->red = $color / 65536;
            $this->green = $color % 65536 / 256;
            $this->blue = $color % 65536 % 256;
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
            printf($this . " deconstructed.\n");
    }

    function __toString()
    {
        $str = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
        return ($str);
    }

    static function doc()
    {
        echo file_get_contents("Color.doc.txt"). "\n";
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