<?php


namespace Example\Controllers;


use Example\Factories\TodoControllerFactory;
use Example\Models\TodoModel;
use Slim\http\Request;
use Slim\http\Response;
use Slim\Views\PhpRenderer;

class TodoController
{
    public $renderer;
    public $todoModel;

    /**
     * TodoController constructor.
     */
    public function __construct(PhpRenderer $renderer, TodoModel $todoModel)
    {
        $this->renderer = $renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        //send todo items to db
        $post = $request->getParsedBody();
        $this->todoModel->sendTodoItems($post);

        //get todo items from the db
        $this->renderer->render($response, 'index.phtml', ['items' => $this->todoModel->getTodoItems(),'doneItems' => $this->todoModel->getDoneItems()]);
    }

}