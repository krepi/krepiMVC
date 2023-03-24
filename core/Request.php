<?php

namespace app\core;

/**
 *
 */
class Request
{
    /**
     * @return mixed|string
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);

    }

    /**
     * @return array
     */
    public function getBody()
    {

        //TODO sprawdz czy isGet i isPost bedzie ok
        $body = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    /**
     * @return string
     */
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * @return bool
     */
    public function isGet()
    {
        return $this->method() === 'get';
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return $this->method() === 'post';
    }


}