<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/dbConstants.php';


//use Tudublin\DotEnvLoader;
//

 //load DB constants from DOTENV
//$dotEnvLoader = new DotEnvLoader();
//$dotEnvLoader->loadDBConstantsFromDotenv();

require_once __DIR__ . '/userMigrationAndFixtures.php';
require_once __DIR__ . '/CoffeeReviewMigrationAndFixtures.php';
require_once __DIR__ . '/commentMigrationAndFixtures.php';
require_once __DIR__ . '/categoryMigrationAndFixtures.php';