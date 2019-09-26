<?php


namespace Example\Factories;


use Example\Models\TodoModel;

class TodoModelFactory
{
    public function __invoke($container)
    {
        $db = $container->get('db');
        $model = new TodoModel($db);
        return $model;
    }
}