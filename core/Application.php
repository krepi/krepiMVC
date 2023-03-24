<?php

namespace app\core;

use app\core\db\Database;
use app\core\db\DbModel;

/**
 *
 */
class Application
{
    /**
     *
     */
    const EVENT_BEFORE_REQUEST = 'beforeRequest';
    /**
     *
     */
    const EVENT_AFTER_REQUEST = 'afterRequest';

    /**
     * @var array
     */
    protected array $eventListeners = [];

    /**
     * @var string
     */
    public static string $ROOT_DIR;
    /**
     * @var Application
     */
    public static Application $app;

    /**
     * @var string
     */
    public string $layout = 'main';
    /**
     * @var string|mixed
     */
    public string $userClass;
    /**
     * @var Router
     */
    public Router $router;
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var Response
     */
    public Response $response;
    /**
     * @var Session
     */
    public Session $session;
    /**
     * @var Database
     */
    public Database $db;
    /**
     * @var Controller|null
     */
    public ?Controller $controller = null;
    /**
     * @var UserModel|null
     */
    public ?UserModel $user;
    /**
     * @var View
     */
    public View $view;


    /**
     * @param $rootPath
     * @param array $config
     */
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->view = new View();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }


    /**
     * @return void
     */
    public function run()
    {
//        $this->triggerEvent(self::EVENT_BEFORE_REQUEST);
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', [
                'exception' => $e,


            ]);
        }
    }

    /**
     * @param UserModel $user
     * @return true
     */
    public function login(UserModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    /**
     * @return void
     */
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');

    }


    /**
     * @param $eventName
     * @param $callback
     * @return void
     */
    public function on($eventName, $callback)
    {
        $this->eventListeners[$eventName][] = $callback;
    }

    /**
     * @return bool
     */
    public static function isGuest() // dałem static
    {
        return !self::$app->user;
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @param $eventName
     * @return void
     */
    public function triggerEvent($eventName)
    {
        $callbacks = $this->eventListeners[$eventName] ?? [];
        foreach ($callbacks as $callback) {
            call_user_func($callback);
        }
    }

}