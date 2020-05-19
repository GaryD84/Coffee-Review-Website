<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Tudublin\CommentRepository;

$commentRepository = new CommentRepository();

// (1) drop then create table
$commentRepository->dropTable();
$commentRespository->createTable();

// (2) delete any existing objects
$commentRespository->deleteAll();

