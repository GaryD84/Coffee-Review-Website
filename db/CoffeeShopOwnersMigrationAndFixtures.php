<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\CoffeeShopOwnersRepository;
use Tudublin\CoffeeShopOwners;

$coffeeShopOwnersRepository = new CoffeeShopOwnersRepository();
$coffeeShopOwnersRepository->dropTable();
$coffeeShopOwnersRepository->createTable();

// (2) delete any existing objects
$coffeeShopOwnersRepository->deleteAll();

// (3) create objects
$u5 = new CoffeeShopOwners();
$u5->setCoffeeShopOwnersname('Shop Owner');
$u5->setPassword('Owner');

$u6 = new CoffeeShopOwners();
$u6->setCoffeeShopOwnersname('shop owner');
$u6->setPassword('Owner');
$u6->setRole('ROLE_SHOP');

// (3) insert objects into DB
$coffeeShopOwnersRepository->create($u5);
$coffeeShopOwnersRepository->create($u6);