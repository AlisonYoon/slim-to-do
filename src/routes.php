<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'TodoController');
    $app->post('/addItem', 'AddItemController');
    $app->post('/moveItem', 'MoveItenController');
};
