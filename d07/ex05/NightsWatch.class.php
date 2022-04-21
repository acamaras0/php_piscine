<?php
    class NightsWatch
    {
        private $fighter = array();
        public function recruit($r)
        {
            if($r instanceof IFighter)
                $this->fighter[] = $r;
        }
        public function fight()
        {
            foreach($this->fighter as $soldat)
            {
                    $soldat->fight();
            }
        }
    }
?>