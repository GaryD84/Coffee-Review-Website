<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\MembersofthepublicRepository;
use Tudublin\Membersofthepublic;


// (1) drop then create table
$membersofthepublicRepository = new MembersofthepublicRepository();  /*members of public*/
$membersofthepublicRepository->dropTable();
$membersofthepublicRepository->createTable();

// (2) delete any existing objects
$membersofthepublicRepository->deleteAll();

// (3) create objects
$u7 = new Membersofthepublic();
$u7->setMembersofthepublicname('');
$u7->setPassword('');

$u8 = new Membersofthepublic();
$u8->setMembersofthepublicname('');
$u8->setPassword('');
$u8->setRole('ROLE_USER');

// (3) insert objects into DB
$membersofthepublicRepository->create($u7);
$membersofthepublicRepository->create($u8);