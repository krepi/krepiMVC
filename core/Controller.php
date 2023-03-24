<?php

namespace app\core;

use app\core\middlewares\BaseMiddleware;

/**
 *
 */
class Controller
{
    /**
     * @var string
     */
    public string $layout = 'main';
    /**
     * @var string
     */
    public string $action = '';

    /**
     * @var \app\core\middlewares\BaseMiddleware[]
     */
    protected array $middlewares = [];

    /**
     * @param $layout
     * @return void
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param $view
     * @param $params
     * @return array|false|string|string[]
     */
    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    /**
     * @param BaseMiddleware $middleware
     * @return void
     */
    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return array
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }


}