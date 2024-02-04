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
    public $products = [[$name => $product]];

    public function __construct($name, Product $product) {
        $this->products = [$name => $product];
    }

    public function addProductToMarket($name, $product) {
        $array = $this->products;
        $newProduct = [$name => $product];
        $newArray = array_merge($array, $newProduct);
        $this->products = $newArray;
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
        $this->cartItems[] = $items;

        return $this->cartItems;
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

$market1 = new MarketStall('orange', $product1);
$market1->addProductToMarket('potato', $product2);
$market1->addProductToMarket('nuts', $product3);

$market2 = new MarketStall('kiwi', $product4);
$market2->addProductToMarket('pepper', $product5);
$market2->addProductToMarket('raspberry', $product6);

$cart = new Cart();
$cart->addToCart($market1->getItem('orange', 5));
$cart->addToCart($market1->getItem('nuts', 3));
$cart->addToCart($market2->getItem('pepper', 6));
$cart->addToCart($market2->getItem('raspberry', 7));
// var_dump($market1->products);
// echo '<hr>';
// var_dump($market1->getItem('orange', 5));
// echo '<hr>';
var_dump($cart->cartItems);

// $cart->printReceipt();


























































?>

