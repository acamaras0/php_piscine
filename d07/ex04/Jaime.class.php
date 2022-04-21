<?php
    class Jaime
    {
        public function sleepWith($character)
        {
            if ($character instanceof Tyrion)
                print("Not even if I'm drunk !\n");
            else if ($character instanceof Sansa)
                print("Let's do this.\n");
            else if ($character instanceof Cersei)
                print("With pleasure, but only in a tower in Winterfell, then.\n");
        }
    }
?>