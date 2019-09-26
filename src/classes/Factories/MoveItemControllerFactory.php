<?php


namespace Example\Factories;


use Example\Controllers\MoveItemController;
use Psr\Container\ContainerInterface;


class MoveItemControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $db = $container->get('TodoModel');
        $MoveItemController = new MoveItemController($renderer, $db);
        return $MoveItemController;
    }

}