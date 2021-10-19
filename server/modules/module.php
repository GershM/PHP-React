<?php

declare(strict_types=1);

require __DIR__."/../vendor/autoload.php";

use \Slim\App;

require __DIR__ . '/../routes/routes.php';
//load composer auto loader (will load slim framework)

/**
 * create an slim api application object, used to route the entire application and handle all api calls from client
 * @return App
 */
function bootstrap(): App
{
    $app = new App(
        [
            'settings' => [
                'determineRouteBeforeAppMiddleware' => true,
                'displayErrorDetails' => true,
                'addContentLengthHeader' => false,
            ]
        ]
    );

    buildRoutes($app);

    return $app;
}
