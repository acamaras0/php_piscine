<?php
    class Tyrion
    {
        public function sleepWith($character)
        {
            if ($character instanceof Jaime)
                print("Not even if I'm drunk !\n");
            else if ($character instanceof Sansa)
                print("Let's do this.\n");
            else if ($character instanceof Cersei)
                print("Not even if I'm drunk !\n");
        }
    }
?>