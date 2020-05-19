<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\SiteadministratorsRepository;
use Tudublin\Siteadministrators;

$Siteadministrators = new SiteadministratorsRepository();
$Siteadministrators->dropTable();
$Siteadministrators->createTable();

// (2) delete any existing objects
$Siteadministrators->deleteAll();

// (3) create objects
$u5 = new Siteadministrators();
$u5->setSiteadministratorsname('Administrators');
$u5->setPassword('Admin');

$u6 = new Siteadministrators();
$u6->setSiteadministratorsname('Administrators');
$u6->setPassword('Admin');
$u6->setRole('ROLE_ADMIN');

// (3) insert objects into DB
$Siteadministrators->create($u6);
$Siteadministrators->create($u7);