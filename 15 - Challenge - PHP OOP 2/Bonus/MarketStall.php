<?php

class MarketStall
{
    public $products = [];

    public function __construct($product) {
        $this->products = [strtolower($product->getName()) => $product];
    }

    public function addProductToMarket($product) {
        $array = [strtolower($product->getName()) => $product];
        $this->products = array_merge($this->products, $array);
        return $this->products;
    }

    public function getItem($item, $value) {
        $item = strtolower($item);
        if (array_key_exists($item, $this->products)){
            $array = ['amount'=>$value, 'item'=>$this->products[$item]];
            return $array;
        }
    }
}

?>