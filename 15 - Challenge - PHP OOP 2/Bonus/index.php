<?php

require_once('Product.php');
require_once('Nuts.php');
require_once('Kiwi.php');
require_once('Orange.php');
require_once('Pepper.php');
require_once('Potato.php');
require_once('Raspberry.php');
require_once('MarketStall.php');
require_once('Cart.php');


$orange = new Orange('Orange', 35, true);
$potato = new Potato('Potato', 240, false);
$nut = new Nuts('Nuts', 850, true);
$kiwi = new Kiwi('Kiwi', 670, false);
$pepper = new Pepper('Pepper', 330, true);
$raspberry = new Raspberry('Raspberry', 555, false);

$market1 = new MarketStall($orange);
$market1->addProductToMarket($potato);
$market1->addProductToMarket($nut);

$market2 = new MarketStall($kiwi);
$market2->addProductToMarket( $pepper);
$market2->addProductToMarket($raspberry);

$cart = new Cart();
$cart->addToCart($market1->getItem('orange', 5));
$cart->addToCart($market1->getItem('nuts', 3));
$cart->addToCart($market2->getItem('pepper', 6));
$cart->addToCart($market2->getItem('raspberry', 7));

$cart->printReceipt();




?>

