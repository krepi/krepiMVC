<?php
/*
* App Core Class
*Creates URL and loads core controller
* URL Format - /controller/method/params
*/

class Core
{

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //    print_r($this->getUrl()) ;
        $url = $this->getUrl();

        //look in controllers for first index/value
        if (isset($url[0])) { //check it is set 
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // if exist , set as controller
                $this->currentController = ucwords($url[0]);
                //unset 0 Inddex
                unset($url[0]);
            }
        }
        //Require controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // iNstatiate controller class
        $this->currentController = new $this->currentController;

        //check fo second part of url
        if (isset($url[1])) {
            //check if mrthod exist in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                //unset 1 index
                unset($url[1]);
            }
        }


        // get params
        $this->params = $url ? array_values($url) : [];

        // call acallback with array params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
//------------------------ end of __construct-----------------------------

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); //remove white spaces after '/'
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
