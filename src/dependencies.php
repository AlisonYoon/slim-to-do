<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    // PDO
    $container['db'] = function($container) {
        $dbConfig = $container->get('settings')['db'];
        $db = new PDO('mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['dbname'] , $dbConfig['username'] , $dbConfig['password']);
        return $db;
    };

    $container['TodoController'] = new \Example\Factories\TodoControllerFactory();
    $container['AddItemController'] = new \Example\Factories\AddItemControllerFactory();
    $container['MoveItemController'] = new \Example\Factories\MoveItemControllerFactory();

    $container['TodoModel'] = new \Example\Factories\TodoModelFactory();
};
