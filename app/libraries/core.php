<?php
/*
* App Core Class
*Creates URL and loads core controller
* URL Format - /controller/method/params
*/

class Core {

    protected $currentController ='Pages';
    protected $currentMethod = 'index';
    protected $params = [];


    public function __construct()
    {
    //    print_r($this->getUrl()) ;
    $url = $this->getUrl();
  
    //look in controllers for first index/value
    if(isset($url[0])){
    if(file_exists('../app/controllers/' . ucwords($url[0]). '.php') )
    {
            // if exist , set as controller
            $this->currentController = ucwords($url[0]);

            //unset 0 Inddex
            unset($url[0]);
    }
}
//Require controller

require_once '../app/controllers/'. $this->currentController . '.php';

// iNstatiate controller class
$this->currentController = new $this->currentController;



    }


    public function getUrl()
    {
        if(isset($_GET['url'])){
           $url = rtrim($_GET['url'], '/') ;
           $url = filter_var($url, FILTER_SANITIZE_URL);
           $url = explode('/', $url);
           return $url;
        }
        
    }

}