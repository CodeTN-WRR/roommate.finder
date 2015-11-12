<?php

/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

//load WRR namespace
$dir_iterator = new RecursiveDirectoryIterator('./wrr');
$iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);
$availableCommands = [];
foreach ($iterator as $fileInfo) {
    if ($iterator->isDot() || $iterator->isDir()) continue;
    require $fileInfo->getPath().DIRECTORY_SEPARATOR.$fileInfo->getFilename();
}


/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

require '.env';
if (empty($user) || empty($pass) || empty($host) || empty($dbname))
    throw new Exception('Environment file not properly configured.');
$connection = new \Wrr\Database\Connection($user, $pass, $host, $dbname);
unset($user, $pass, $host, $dbname);
/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

// GET route
$app->get(
    '/',
    function () {
        global $connection;
        $roommate = new \Wrr\Roommate($connection);
        $roommate->loadById(1);
        var_dump($roommate);
    }
);

// POST route
$app->post(
    '/post',
    function () {
        echo 'This is a POST route';
    }
);
/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
