<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\StaffRepository;
use Tudublin\Staff;

$StaffRepository = new StaffRepository();
$StaffRepository->dropTable();
$StaffRepository->createTable();

// (2) delete any existing objects
$StaffRepository->deleteAll();

// (3) create objects
$u1 = new Staff();
$u1->setStaffname('staff');
$u1->setPassword('Admin');

$u2 = new Staff();
$u2->setStaffname('CSR Staff');
$u2->setPassword('Admin');
$u2->setRole('ROLE_Staff');

// (3) insert objects into DB
$StaffRepository->create($u1);
$StaffRepository->create($u2);