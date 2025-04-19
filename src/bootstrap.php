<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;

//Autoload
require dirname(__DIR__) . '/vendor/autoload.php';

// Load .env
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

// Build container
$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions(require __DIR__ . '/config.php');
$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

// Register middleware
(require __DIR__ . '/middleware.php')($app);

//Load routes
(require __DIR__ . '/routes.php')($app);

return $app;
