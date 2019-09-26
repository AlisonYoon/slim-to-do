<?php


namespace Example\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class MoveItemController
{
    public $todoModel;

    /**
     * MoveItemController constructor.
     * @param $todoModel
     */
    public function __construct(PhpRenderer $renderer, $todoModel)
    {
        $this->renderer = $renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $postMove = $request->getParsedBody();
        $this->todoModel->moveTodoItems($postMove);

        $this->renderer->render($response, 'index.phtml', ['doneItems' => $this->todoModel->moveTodoItems()]);
    }

}