<?php
// echo $_SERVER['QUERY_STRING'];

require '../Core/Router.php';

$router = new Router();

// echo get_class($router);

// add the routes

$router->add('',['controller' =>'Home', 'action'=>'index']);
$router->add('posts',['controller' =>'Posts', 'action'=>'index']);
$router->add('posts/new',['controller' =>'Posts', 'action'=>'new']);

// echo '<pre>';
// var_dump($router->getRoutes());
// echo '<pre>';

$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)){
    echo '<pre>';
var_dump($router->getParams());
echo '<pre>';
} else {
    echo 'not route for URL '.$url ;
}