<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\CoffeeReview;
use Tudublin\CoffeeReviewRepository;

$coffeeReviewRepository = new CoffeeReviewRepository();

// (1) drop then create table
//$CoffeeReviewRepository->dropTable();
//$CoffeeReviewRepository->createTable();

// (2) delete any existing objects
//$CoffeeReviewRepository->deleteAll();

// (3) create objects
$m1 = new CoffeeReview();
$m1->setId(1);
$m1->setTitle('North Star coffee');
$m1->setCategory('Cap pa chino');
$m1->setPrice(2.99);
$m1->setVoteTotal(5);
$m1->setNumVotes(1);

$m2 = new CoffeeReview();
$m2->setId(2);
$m2->setTitle('Coffee Dock');
$m2->setCategory('Amer ic ano');
$m2->setPrice(1.99);
$m2->setVoteTotal(77 * 90);
$m2->setNumVotes(77);

$m3 = new CoffeeReview();
$m3->setId(3);
$m3->setTitle('The Oul Dub');
$m3->setCategory('ess pre sso');
$m3->setPrice(2.50);
$m3->setVoteTotal(5 * 50);
$m3->setNumVotes(5);

$m4 = new CoffeeReview();
$m4->setId(4);
$m4->setTitle('The Ramblers coffee');
$m4->setCategory('Latte');
$m4->setPrice(3.10);
$m4->setVoteTotal(0);
$m4->setNumVotes(1);

$m5 = new CoffeeReview();
$m5->setId(5);
$m5->setTitle('Coffee Lover');
$m5->setCategory('Moc ca');
$m5->setPrice(1.99);
$m5->setVoteTotal(95 * 201);
$m5->setNumVotes(201);

// (4) insert objects into DB
$CoffeeReviewRepository->create($m1);
$CoffeeReviewRepository->create($m2);
$CoffeeReviewRepository->create($m3);
$CoffeeReviewRepository->create($m4);
$CoffeeReviewRepository->create($m5);

//// (5) test objects are there
$CoffeeReview = $CoffeeReviewRepository->findAll();
print '<pre>';
var_dump($CoffeeReview);
