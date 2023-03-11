<?php

namespace Core;

use PDO;
use PDOException;
use App\Config;

abstract class Model
{

    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
//             $host = 'localhost';
//             $dbname = 'kmvc';
//             $username = 'root';
//             $password = '';
            try {
                $dsn = 'mysql:host=' . Config::DB_HOST . '; dbname=' . Config::DB_NAME . '; charset=utf8';
                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $db;
    }


}