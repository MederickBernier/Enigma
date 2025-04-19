<?php

use Slim\App;
use Slim\Middleware\ErrorMiddleware;
use App\Middleware\JsonBodyParserMiddleware;

return function (App $app) {
    $errorMiddleware = new ErrorMiddleware(
        $app->getCallableResolver(),
        $app->getResponseFactory(),
        $_ENV['APP_DEBUG'] ?? false,
        true,
        true,
    );
    $app->add($errorMiddleware);

    // Add Custom Middleware here
    $app->add(JsonBodyParserMiddleware::class);
};
