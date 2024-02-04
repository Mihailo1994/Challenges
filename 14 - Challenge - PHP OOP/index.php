<?php 

interface Printable
{
    public function print();
    public function sneakpeek();
    public function fullinfo();
}

class Furniture 
{
    private int $width;
    private int $length;
    private int $height;
    private $isForSeating;
    private $isForSleeping;

    public function __construct(int $width, int $length, int $height) {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }

    public function setIsForSeating($seating) {
        $this->isForSeating = $seating;
    }

    public function setIsForSleeping($sleeping) {
        $this->isForSleeping = $sleeping;
    }

    public function getIsForSeating() {
        return $this->isForSeating;
    }

    public function getIsForSleeping() {
        return $this->isForSleeping;
    }

    public function area() {
        return $this->width * $this->length;
    }

    public function volume() {
        return $this->area() * $this->height;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getLength() {
        return $this->length;
    }

    public function getHeight() {
        return $this->height;
    }
    
}

$Mebel = new Furniture(75, 155, 60);
$Mebel->setIsForSeating(true);
$Mebel->setIsForSleeping(false);
echo $Mebel->getIsForSeating();
echo '<br>';
echo $Mebel->getIsForSleeping();
echo '<br>';
echo $Mebel->area();
echo '<br>';
echo $Mebel->volume();
echo '<hr>';

class Sofa extends Furniture implements Printable
{
    private int $seats;
    private int $armrests;
    private int $lengthOpened;

    public function __construct(int $width, int $length, int $height) {
        parent::__construct($width, $length, $height);
    }

    public function setSeats($seats) {
        $this->seats = $seats;
    }

    public function getSeats() {
        return $this->seats;
    }

    public function setArmrests($armrests) {
        $this->armrests = $armrests;
    }

    public function getArmrests() {
        return $this->armrests;
    }

    public function setLengthOpened($lengthOpened) {
        $this->lengthOpened = $lengthOpened;
    }

    public function getLengthOpened() {
        return $this->lengthOpened;
    }

    public function areaOpened() {
        if ($this->getIsForSleeping() == true) {
            return $this->getWidth() * $this->lengthOpened;
        } else {
            echo 'This sofa is for sitting only, it has ' . $this->armrests . ' armrests and ' . $this->seats . ' seats.'; 
        }
    }

    public function print() {
        if ($this->getIsForSeating() == true && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sitting and sleeping, ' . $this->area() . 'cm2';
        } else if ($this->getIsForSeating() == false && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sleeping only, ' . $this->area() . 'cm2';
        } else if ($this->getIsForSeating() == true && $this->getIsForSleeping() == false) {
            echo get_class($this) . ', seating only, ' . $this->area() . 'cm2';
        }
    }

    public function sneakpeek() {
        echo get_class($this);
    }

    public function fullinfo() {
        if ($this->getIsForSeating() == true && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sitting and sleeping, width: ' . $this->getWidth() . 'cm, length: ' . $this->getLength() . 'cm, height: ' . $this->getHeight() . 'cm';
        } else if ($this->getIsForSeating() == false && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sleeping only, width: ' . $this->getWidth() . 'cm, length: ' . $this->getLength() . 'cm, height: ' . $this->getHeight() . 'cm';
        } else if ($this->getIsForSeating() == true && $this->getIsForSleeping() == false) {
            echo get_class($this) . ', seating only, width: ' . $this->getWidth() . 'cm, length: ' . $this->getLength() . 'cm, height: ' . $this->getHeight() . 'cm';
        }
    }
}


$Sofa = new Sofa(80, 150, 75);
$Sofa->setIsForSeating(true);
$Sofa->setIsForSleeping(false);
$Sofa->setArmrests(2);
$Sofa->setSeats(5);
$Sofa->area();
$Sofa->volume();
$Sofa->areaOpened();
$Sofa->setIsForSleeping(true);
$Sofa->setLengthOpened(210);
echo '<br>';
echo $Sofa->areaOpened();
echo '<hr>';

class Bench extends Sofa implements Printable
{
    public function __construct(int $width, int $length, int $height) {
        parent::__construct($width, $length, $height);
    }

    public function print() {
        if ($this->getIsForSeating() == true && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sitting and sleeping, ' . $this->area() . 'cm2';
        } else if ($this->getIsForSeating() == false && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sleeping only, ' . $this->area() . 'cm2';
        } else if ($this->getIsForSeating() == true && $this->getIsForSleeping() == false) {
            echo get_class($this) . ', seating only, ' . $this->area() . 'cm2';
        }
    }

    public function sneakpeek() {
        echo get_class($this);
    }

    public function fullinfo() {
        if ($this->getIsForSeating() == true && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sitting and sleeping, width: ' . $this->getWidth() . 'cm, length: ' . $this->getLength() . 'cm, height: ' . $this->getHeight() . 'cm';
        } else if ($this->getIsForSeating() == false && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sleeping only, width: ' . $this->getWidth() . 'cm, length: ' . $this->getLength() . 'cm, height: ' . $this->getHeight() . 'cm';
        } else if ($this->getIsForSeating() == true && $this->getIsForSleeping() == false) {
            echo get_class($this) . ', seating only, width: ' . $this->getWidth() . 'cm, length: ' . $this->getLength() . 'cm, height: ' . $this->getHeight() . 'cm';
        }
    }
}

class Chair extends Furniture implements Printable
{
    public function __construct(int $width, int $length, int $height) {
        parent::__construct($width, $length, $height);
    }

    public function print() {
        if ($this->getIsForSeating() == true && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sitting and sleeping, ' . $this->area() . 'cm2';
        } else if ($this->getIsForSeating() == false && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sleeping only, ' . $this->area() . 'cm2';
        } else if ($this->getIsForSeating() == true && $this->getIsForSleeping() == false) {
            echo get_class($this) . ', seating only, ' . $this->area() . 'cm2';
        }
    }

    public function sneakpeek() {
        echo get_class($this);
    }

    public function fullinfo() {
        if ($this->getIsForSeating() == true && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sitting and sleeping, width: ' . $this->getWidth() . 'cm, length: ' . $this->getLength() . 'cm, height: ' . $this->getHeight() . 'cm';
        } else if ($this->getIsForSeating() == false && $this->getIsForSleeping() == true) {
            echo get_class($this) . ', sleeping only, width: ' . $this->getWidth() . 'cm, length: ' . $this->getLength() . 'cm, height: ' . $this->getHeight() . 'cm';
        } else if ($this->getIsForSeating() == true && $this->getIsForSleeping() == false) {
            echo get_class($this) . ', seating only, width: ' . $this->getWidth() . 'cm, length: ' . $this->getLength() . 'cm, height: ' . $this->getHeight() . 'cm';
        }
    }
}

$Bench = new Bench(40, 140, 60);
$Bench->setSeats(6);
$Bench->setArmrests(2);
$Bench->setLengthOpened(160);
$Bench->setIsForSeating(true);
$Bench->setIsForSleeping(true);


$Chair = new Chair(55, 55, 80);
$Chair->setIsForSeating(true);
$Chair->setIsForSleeping(false);

$Sofa->print();
echo '<br>';
$Sofa->sneakpeek();
echo '<br>';
$Sofa->fullinfo();
echo '<hr>';
$Bench->print();
echo '<br>';
$Bench->sneakpeek();
echo '<br>';
$Bench->fullinfo();
echo '<hr>';
$Chair->print();
echo '<br>';
$Chair->sneakpeek();
echo '<br>';
$Chair->fullinfo();
echo '<br>';


?>