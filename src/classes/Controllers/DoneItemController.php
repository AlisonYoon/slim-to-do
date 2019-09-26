<?php


namespace Example\Controllers;


use Example\Models\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class DoneItemController
{
    public $renderer;
    public $todoModel;

    /**
     * DoneItemController constructor.
     * @param $renderer
     * @param $todoModel
     */
    public function __construct(PhpRenderer $renderer, TodoModel $todoModel)
    {
        $this->renderer = $renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        //get done items from the db
        $this->renderer->render($response, 'index.phtml', ['doneItems' => $this->todoModel->getDoneItems()]);
    }


}