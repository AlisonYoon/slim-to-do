<?php


namespace Example\Factories;


use Example\Controllers\AddItemController;
use Example\Models\TodoModel;

class AddItemControllerFactory
{
    public function __invoke($container)
    {
        $db = $container->get('TodoModel');
        $AddItem = new AddItemController($db);
        return $AddItem;
    }

}