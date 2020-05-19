<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/dbConstants.php';



use Tudublin\CommentRepository;
//use \Tudublin\DotEnvLoader;


// load DB constants from DOTENV
//$dotEnvLoader = new DotEnvLoader();
//$dotEnvLoader->loadDBConstantsFromDotenv();

$commentRepository = new CommentRepository();

// (1) drop then create table
$commentRepository->dropTable();
$commentRepository->createTable();

// (2) delete any existing objects
$commentRepository->deleteAll();

