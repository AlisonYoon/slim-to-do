<?php


namespace Example\Controllers;


use Slim\http\Request;
use Slim\http\Response;
use Slim\Views\PhpRenderer;

class TodoController
{
    public $renderer;

    /**
     * TodoController constructor.
     */
    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, $args)
    {

    }


}