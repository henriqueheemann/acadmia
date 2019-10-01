<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/[{nome}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        $conexao = $container->get('pdo');

        $resultSet = $conexao->query('SELECT * from cadastro WHERE nome = "' .$args['nome'] . '"')->fetchAll();

        $args['cadastro'] = $resultSet;
        

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
};
