<?php

require_once('Product.php');

class Potato extends Product
{
    public function __construct(string $name, int $price, bool $sellingByKg){
    parent::__construct($name, $price, $sellingByKg);
    }
}

?>