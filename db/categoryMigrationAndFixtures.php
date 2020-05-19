<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\Category;
use Tudublin\CategoryRepository;

$categoryRepository = new CategoryRepository();

// (1) drop then create table
$categoryRepository->dropTable();
$categoryRepository->createTable();

// (2) delete any existing objects
$categoryRepository->deleteAll();

// (3) create objects
$c1 = new Category();
$c1->setId(1);
$c1->setCategory('Irish Coffee shop');
//$c1->setDescription('A local Favourite That Brings Everyone From Far And Wide');

$c2 = new Category();
$c2->setId(2);
$c2->setCategory('Italian Coffee Shop');
//$c2->setDescription('Traditional Italian Brewed Coffee');


// (4) insert objects into DB
$categoryRepository->create($c1);
$categoryRepository->create($c2);
