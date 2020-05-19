<?php
require_once __DIR__ . '/../config/dbConstants.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\CoffeeReview;
use Tudublin\CoffeeReviewRepository;

$coffeeReviewRepository = new CoffeeReviewRepository();// issue with this line of code?
$faker = Faker\Factory::create();

// (1) drop then create table
$coffeeReviewRepository->dropTable();
$coffeeReviewRepository->createTable();

// (2) delete any existing objects
$coffeeReviewRepository->deleteAll();

// (3) create objects and insert into db
$m1 = new CoffeReview();
$m1->setId(1);
$m1->setTitle('NorthStar Coffee');
$m1->setCategory('Americano');
$m1->setPrice(2.20);
$m1->setVoteTotal(5);
$m1->setNumVotes(1);

$coffeeReviewRepository->create($m1);

for($id=2; $id < 10; $id++){
    $title = $faker->sentence(2);
    $category = $faker->randomElement(['Amer ic ano', 'la tt ee', 'espresso', 'capp ach ino', 'mo cca']);
    $price = $faker->randomFloat(2, 1.00, 10.00);
    $voteTotal = $faker->numberBetween(20, 60);
    $numVotes = $faker->numberBetween(0, 25);

    $m = new CoffeeReview();
    $m->setId($id);
    $m->setTitle($title);
    $m->setCategory($category);
    $m->setPrice($price);
    $m->setNumVotes($numVotes);
    $m->setVoteTotal($voteTotal);

    $coffeeReviewRepository->create($m);
}


/*
$m2 = new CoffeeShop();
$m2->setId(2);
$m2->setTitle('The Oul Rambler');
$m2->setCategory('espresso');
$m2->setPrice(3.10);
$m2->setVoteTotal(77 * 90);
$m2->setNumVotes(77);


$m3 = new CoffeShop();
$m3->setId(3);
$m3->setTitle('Coffee Hub');
$m3->setCategory('Latte');
$m3->setPrice(2.45);
$m3->setVoteTotal(5 * 50);
$m3->setNumVotes(5);


$m4 = new CoffeeShop();
$m4->setId(4);
$m4->setTitle('dockstop coffee');
$m4->setCategory('mocco');
$m4->setPrice(2.05);
$m4->setVoteTotal(0);
$m4->setNumVotes(0);


$m5 = new CoffeeShop();

$m5->setId(5);
$m5->setTitle('java express');
$m5->setCategory('americano');
$m5->setPrice(3.15);
$m5->setVoteTotal(95 * 201);
$m5->setNumVotes(201);


// (4) insert objects into DB
$CoffeeReviewRespository->create($m1);
$CoffeeReviewRespository->create($m2);
$CoffeeReviewRespository->create($m3);
$CoffeeReviewRespository->create($m4);
$CoffeeReviewRespository->create($m5);*/


$coffeeReview = $coffeeReviewRepository->findAll();
print '<pre>';
var_dump($coffeeReview);
