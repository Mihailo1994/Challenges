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

    public function __construct(Product $product) {
        $this->products = [strtolower($product->name) => $product];
    }

    public function addProductToMarket($product) {
        $array = $this->products;
        $newProduct = [strtolower($product->name) => $product];
        $newArray = array_merge($array, $newProduct);
        $this->products = $newArray;
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

$market1 = new MarketStall($product1);
$market1->addProductToMarket($product2);
$market1->addProductToMarket($product3);

$market2 = new MarketStall($product4);
$market2->addProductToMarket($product5);
$market2->addProductToMarket($product6);

$cart = new Cart();
$cart->addToCart($market1->getItem('orangE', 5));
$cart->addToCart($market1->getItem('nutS', 3));
$cart->addToCart($market2->getItem('pePper', 6));
$cart->addToCart($market2->getItem('raspberry', 7));


$cart->printReceipt();




?>

