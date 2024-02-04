<?php

class Cart 
{
    public $cartItems = [];

    public function addToCart($items) {
        if (!$items == NULL) {
            $this->cartItems[] = $items;
            return $this->cartItems;
        }
    }

    function printReceipt() {
        if (empty($this->cartItems)) {
            echo 'Your cart is empty';
        } else {
            $finalPrice = 0;
            foreach($this->cartItems as $item){
                if ($item['item']->getSellingByKg() === true) {
                    $package = 'kgs';
                } else {
                    $package = 'gunny sacks';
                }
                $price = $item['item']->getPrice() * $item['amount'];
                echo $item['item']->getName() . ' | ' . $item['amount'] . ' ' . $package . ' | ' . 'total = ' . $price . ' denars <br>';
                $finalPrice += $price;
            }
            echo '<br>';
            echo 'Final price amount: ' . $finalPrice . ' denars';
        }
    }
}

?>