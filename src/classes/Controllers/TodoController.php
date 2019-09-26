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
        $post = $request->getParsedBody();
        var_dump($post);
//        $get = $request->getParams();
//        echo "<br>";
//        var_dump($get);
        $this->todoModel->sendTodoItems($post);

        $this->renderer->render($response, 'index.phtml', ['item' => $post["addTodo"]]);
    }


}