<?php


namespace Example\Controllers;

use Slim\Http\Request;
use Example\Models\TodoModel;
use Slim\http\Response;

class AddItemController
{
    public $todoModel;

    /**
     * AddItemController constructor.
     * @param $todoModel
     */
    public function __construct($todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        //send todo items to db
        $post = $request->getParsedBody();
        $this->todoModel->sendTodoItems($post);
        return $response->withRedirect('/');
    }


}