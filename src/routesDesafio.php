<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();


    $app->get('/desafio/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/desafio/' route");



        $conexao = $container->get('pdo');


      
        $conexao = $container->get('pdo');
        

        $resultSet = $conexao->query('SELECT * FROM desafios')->fetchAll();

        $args['desafio'] = $resultSet;


        // Render index view
        return $container->get('renderer')->render($response, 'desafio.phtml', $args);
    });
    
};