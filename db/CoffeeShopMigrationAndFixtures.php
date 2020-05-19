<?php
require_once __DIR__ . '/../vendor/autoload.php';


use Tudublin\CoffeeShop;



$u9 = new CoffeeShop();
$u9->setCoffeeShopname('');
$u9->setPassword('');

$u10 = new CoffeeShop();
$u10->setCoffeeShopname('');
$u10->setPassword('');
$u10->setRole('ROLE_COFFEE SHOP');

// (3) insert objects into DB
$CoffeeShopRepository->create($u9);
$CoffeeShopRepository->create($u10);



