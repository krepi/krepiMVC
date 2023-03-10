<?php


require '../Core/Router.php';
require '../App/Controllers/Posts.php';

$router = new Router();



// add the routes

$router->add('',['controller' =>'Home', 'action'=>'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\+}/{action}');



$router->dispatch($_SERVER['QUERY_STRING']);