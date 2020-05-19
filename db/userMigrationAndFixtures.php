<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\UserRepository;
use Tudublin\User;


// (1) drop then create table
$UserRepository = new UserRepository();  /*members of public*/
$UserRepository->dropTable();
$UserRepository->createTable();

// (2) delete any existing objects
$UserRepository->deleteAll();

// (3) create objects
$u1 = new User();
$u1->setUsername('Gary');
$u1->setPassword('Dempsey');

$u2 = new User();
$u2->setUsername('admin');
$u2->setPassword('admin');
$u2->setRole('ROLE_ADMIN');



// (3) insert objects into DB
$UserRepository->create($u1);
$UserRepository->create($u2);



