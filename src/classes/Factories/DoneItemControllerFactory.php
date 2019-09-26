<?php


namespace Example\Factories;


use Example\Controllers\TodoController;
use Psr\Container\ContainerInterface;

class DoneItemControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $todoModel = $container->get('TodoModel');
        $DoneItemController = new DoneItemController($renderer, $todoModel);
        return $DoneItemController;
    }

}