<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* edit your project APP PATH */
define('APP_PATH', __DIR__ . '/../abit-slim-starter');
define('NOT_FOUND_SMS', 'No record in the system!');
define('ADDED_SMS', 'Record added.');
define('SAVED_SMS', 'Data saved.');
define('DELETED_SMS', 'Record deleted successfully.');
define('UNDELETED_SMS', 'Unable to delete this record!');
define('BAD_REQUEST_SMS', 'Invalid request!');
define('DENIED_SMS', "You don't have permission to access this page.");

require APP_PATH . '/vendor/autoload.php';

// Instantiate the app
$config = require APP_PATH . '/src/config.php';

//set DateTimeZone
date_default_timezone_set($config['settings']['timezone']);

$app = new \Slim\App($config);

// Set up dependencies
require APP_PATH . '/src/bootstrap.php';

// Register middleware
require APP_PATH . '/src/middleware.php';

// Container
require APP_PATH . '/src/container.php';

// Register routes
require APP_PATH . '/src/routers.php';

// Fire Debugbar
$container->debugger;

$app->run();
