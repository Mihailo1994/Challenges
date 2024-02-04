<?php

class Product 
{
    public $name;
    public $price;
    public $sellingByKg;

    public function __construct(string $name, int $price, bool $sellingByKg) {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }

    public function getPrice() {
        return $this->price;
    }
}

class MarketStall
{
    public $products = [];

    public function __construct($product) {
        $this->products = $product;
    }

    public function addProductToMarket($product) {
        $this->products = array_merge($this->products, $product);
        return $this->products;
    }

    public function getItem($item, $value) {
        if (array_key_exists($item, $this->products)){
            $array = ['amount'=>$value, 'item'=>$this->products[$item]];
            return $array;
        }
    }
}

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
                if ($item['item']->sellingByKg === true) {
                    $package = 'kgs';
                } else {
                    $package = 'gunny sacks';
                }
                $price = $item['item']->price * $item['amount'];
                echo $item['item']->name . ' | ' . $item['amount'] . ' ' . $package . ' | ' . 'total = ' . $price . ' denars <br>';
                $finalPrice += $price;
            }
            echo '<br>';
            echo 'Final price amount: ' . $finalPrice . ' denars';
        }
    }
    
}


$product1 = new Product('Orange', 35, true);
$product2 = new Product('Potato', 240, false);
$product3 = new Product('Nuts', 850, true);
$product4 = new Product('Kiwi', 670, false);
$product5 = new Product('Pepper', 330, true);
$product6 = new Product('Raspberry', 555, false);

$market1 = new MarketStall(['orange' => $product1]);
$market1->addProductToMarket(['potato' => $product2]);
$market1->addProductToMarket(['nuts' => $product3]);
// var_dump($market1->products);

$market2 = new MarketStall(['kiwi' => $product4]);
$market2->addProductToMarket(['pepper' => $product5]);
$market2->addProductToMarket(['raspberry' => $product6]);

$cart = new Cart();
$cart->addToCart($market1->getItem('orange', 5));
$cart->addToCart($market1->getItem('nuts', 3));
$cart->addToCart($market2->getItem('pepper', 6));
$cart->addToCart($market2->getItem('raspberry', 7));
// var_dump($market1->getItem('orange', 5));

var_dump($cart->cartItems);
$cart->printReceipt();




?>

