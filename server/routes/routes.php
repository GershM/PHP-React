<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Slim\App;

require __DIR__ . "/../database/Database.php";

function buildRoutes(App $app): void
{
    $app->group('', function () {
        $this->post('/test', function (Request $req, Response $res): Response {
            $data=[
                "test1"=>1,
                "test2"=>2
            ];
            return  $res->withJson($data);
        });

    });
}
