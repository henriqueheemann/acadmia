<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/ajuda/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/ajuda/' route");

        if ($_SESSION['login']['ehLogado'] != true) {
            return $response->withRedirect('/login/');
            exit;
        }
        
        // Render index view
        return $container->get('renderer')->render($response, 'ajuda.phtml', $args);
    });

};
