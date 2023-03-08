<?php
// echo $_SERVER['QUERY_STRING'];

require '../Core/Router.php';

$router = new Router();

echo get_class($router);