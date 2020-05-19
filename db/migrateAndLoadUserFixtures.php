<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\DotEnvLoader;
//use Tudublin\UserRepository;
//use Tudublin\User;
use Tudublin\StaffRepository;
use Tudublin\CoffeeShopOwnersRepository;
use Tudublin\MembersofthepublicRepository;
use Tudublin\Membersofthepublic;

use Tudublin\Staff;
use Tudublin\CoffeeShopOwners;
use Tudublin\CoffeeShopRepository;
//use Tudublin\CoffeeShop;
use Tudublin\CategoryRepository;
use Tudublin\Category;


$dotEnvLoader = new DotEnvLoader();//issue with this line of code?
$dotEnvLoader->loadDBConstantsFromDotenv();



/*// (1) drop then create table
$UserRepository = new UserRepository();
$UserRepository->dropTable();
$UserRepository->createTable();

// (2) delete any existing objects
$UserRepository->deleteAll();

// (3) create objects
$u1 = new User(); //administrator
$u1->setUsername('Gary');
$u1->setPassword('Dempsey');

$u2 = new User(); //administrator
$u2->setUsername('admin');
$u2->setPassword('201184');
$u2->setRole('ROLE_ADMIN');

// (3) insert objects into DB
$UserRepository->create($u1);
$UserRepository->create($u2);*/

// (4) test objects are there
$Users = $UserRepository->findAll();
print '<pre>';
var_dump($Users);

$StaffRepository = new StaffRepository();
$StaffRepository->dropTable();
$StaffRepository->createTable();

// (2) delete any existing objects
$StaffRepository->deleteAll();

// (3) create objects
$s3 = new Staff();
$s3->setStaffname('csr staff');
$s3->setPassword('Admin');

$s4 = new Staff();
$s4->setStaffname('csr staff');
$s4->setPassword('Admin');
$s4->setRole('ROLE_Staff');

// (3) insert objects into DB
$StaffRepository->create($s3);
$StaffRepository->create($s4);

// (4) test objects are there
$Staff = $StaffRepository->findAll();
print '<pre>';
var_dump($Staff);

$CoffeeShopOwnersRepository = new CoffeeShopOwnersRepository();
$CoffeeShopOwnersRepository->dropTable();
$CoffeeShopOwnersRepository->createTable();

// (2) delete any existing objects
$CoffeeShopOwnersRepository->deleteAll();

// (3) create objects
$cso5 = new CoffeeShopOwners();
$cso5->setCoffeeShopOwnersname('shop owner');
$cso5->setPassword('Owner');

$cso6 = new CoffeeShopOwners();
$cso6->setCoffeeShopOwnersname('admin');
$cso6->setPassword('Owner');
$cso6->setRole('ROLE_SHOP');

// (3) insert objects into DB
$CoffeeShopOwnersRepository->create($cso5);
$CoffeeShopOwnersRepository->create($cso6);

// (4) test objects are there
$CoffeeShopOwners = $CoffeeShopOwnersRepository->findAll();
print '<pre>';
var_dump($CoffeeShopOwners);

$membersofthepublicRepository = new MembersofthepublicRepository();
$membersofthepublicRepository->dropTable();
$membersofthepublicRepository->createTable();

// (2) delete any existing objects
$membersofthepublicRepository->deleteAll();

// (3) create objects
$mob7 = new Membersofthepublic();
$mob7->setMembersofthepublicname('');
$mob7->setPassword('');

$mob8 = new Membersothepublic();
$mob8->setMembersofthepublicname('');
$mob8->setPassword('');
$mob8->setRole('ROLE_PUBLIC');

// (3) insert objects into DB
$membersofthepublicRepository->create($mob7);
$membersofthepublicRepository->create($mob8);

// (1) drop then create table
$coffeeShopRepository = new CoffeeShopRepository();
$coffeeShopRepository->dropTable();
$coffeeShopRepository->createTable();

// (2) delete any existing objects
$coffeeShopRepository->deleteAll();

// (3) create objects
/*$cs9 = new CoffeeShop();
$cs9->setCoffeeShopname('');
$cs9->setPassword('');

$cs10 = new CoffeeShop();
$cs10->setUsername('');
$cs10->setPassword('');
$cs10->setRole('ROLE_COFFEE SHOP');

// (3) insert objects into DB
$CoffeeShopRepository->create($cs9);
$CoffeeShopRepository->create($cs10);*/

// (4) test objects are there
$CoffeeShop = $coffeeShopRepository->findAll();
print '<pre>';
var_dump($CoffeeShop);


// (1) drop then create table
$categoryRepository = new CategoryRepository();
$coffeeShopRepository->dropTable();
$categoryRepository->createTable();

// (2) delete any existing objects
$coffeeShopRepository->deleteAll();

// (3) create objects
$c11 = new Category();
$c11->setusername('');
$c11->setPassword('');

$c12 = new Category();
$c12->setCategory('');
$c12->setPassword('');
$c12->setRole('ROLE_CATEGORY');

// (3) insert objects into DB
$categoryRepository->create($c11);
$categoryRepository->create($c12);

// (4) test objects are there
$Category = $categoryRepository->findAll();
print '<pre>';
var_dump($Category);

