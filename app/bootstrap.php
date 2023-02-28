<?php
//Load Cofig file
require_once 'config/config.php';

// Load libraries
// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

//Autoloader for libraries files

spl_autoload_register(function($className){
    require_once 'libraries/'. $className .'.php';
});
