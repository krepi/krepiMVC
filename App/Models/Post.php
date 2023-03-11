<?php

namespace App\Models;

use http\Exception\RuntimeException;
use PDO;
use PDOException;

class Post extends \Core\Model
{
    public static function getAll()
    {
        $host = 'localhost';
        $dbname = 'kmvc';
        $username = 'root';
        $password = '';

        try {
//            $db = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();
            $stmt = $db->query('SELECT id, title, body FROM posts ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
}