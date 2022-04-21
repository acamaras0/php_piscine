<?php
    class UnholyFactory
    {
        private $fighter = array();
        private $str = array();
        public function absorb($f)
        {
            if (get_parent_class($f))
            {
                if (in_array($f, $this->fighter))
                {
                    print(("(Factory already absorbed a fighter of type "). $f->getName() . ")" . "\n");
                }
                else
                {
                    print("(Factory absorbed a fighter of type " . $f->getName() . ")" . "\n");
                    $this->fighter[] = $f;
                    $this->str[] = strtolower(get_class($f));
                }
            }
            else
            {
                print("(Factory can't absorb this, it's not a fighter)\n");
            }
        }
        public function fabricate($f)
        {
            $str1 = str_replace(" ", "", $f);
            if (in_array($str1, $this->str))
            {
                $index = array_search($str1, $this->str);
                print("(Factory fabricates a fighter of type " . $f . ")" . "\n");
                return ($this->fighter[$index]);
            }
            print(("(Factory hasn't absorbed any fighter of type "). $f . ")" . "\n");
                return NULL;
        }
    }
?>