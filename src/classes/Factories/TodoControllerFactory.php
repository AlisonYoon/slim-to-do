<?php


namespace Example\Factories;


use Example\Controllers\TodoController;
use Psr\Container\ContainerInterface;

class TodoControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $TodoController = new TodoController($renderer);
        return $TodoController;
    }

}