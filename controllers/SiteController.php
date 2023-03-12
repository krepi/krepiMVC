<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;

class SiteController extends Controller
{
    public function handleContact()
    {
        return "złapanie zatwierdzionych danych";
    }

    public  function contact()
    {
        return Application::$app->router->renderView('contact') ;
    }
    public  function home()
    {
        $params = [
            'name'=>'Krepolian'
        ];
        return $this->render('home',$params) ;
    }
}