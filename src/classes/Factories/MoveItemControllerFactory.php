<?php


namespace Example\Factories;


use Example\Controllers\MoveItemController;

class MoveItemControllerFactory
{
    public function __invoke($container)
    {
        $db = $container->grt('TodoModel');
        $moveItem = new MoveItemController($db);
        return $moveItem;
    }

}