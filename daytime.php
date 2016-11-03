<?php

class DayTime {
    /** @var  int  Часы */
    private $h;
    /** @var  int  Минуты */
    private $m;
    /** @var  int  Секунды */
    private $s;

    public function __construct($h, $m, $s) {
    	
    	if($s < 60) {

    		$this->s = $s;

    	} else {

    		$this->s = ($s % 60);

    		$diff_m = ($s - $this->s)/60;
    	}

    	if(($m + $diff_m) < 60) {

    		$this->m = $m + $diff_m;

    	} else {

    		$this->m = ($m + $diff_m) % 60;

    		$diff_h = (($m + $diff_m) - $this->m)/60;
    	}

    	if(($h + $diff_h) < 24) {

    		$this->h = $h + $diff_h;

    	} else {

    		$this->h = ($h + $diff_h) % 24;
    	}

    }

    public function getH()
    {
    	return $this->h;
    }

    public function getM()
    {
    	return $this->m;
    }

    public function getS()
    {
    	return $this->S;
    }
   

  
    public function getTimeDiffInSec(DayTime $dtime) 
    {
    	return abs(($this->getH()*60*60 + $this->getM()*60 + $this->getS()) - ($dtime->getH()*60*60 + $dtime->getM()*60 + $dtime->getS()));
    }

    public function getTimeDiffFormated(DayTime $dtime)
    {
    	return date("H:i:s", mktime(0, 0, $this->getTimeDiffInSec($dtime))); 
    }



}


$a = new DayTime(28, 65, 70);

$b = new DayTime(40, 80, 80);

echo $a->getTimeDiffInSec($b); 

echo '<br>' . $a->getTimeDiffFormated($b);

?>
