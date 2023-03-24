<?php

namespace app\core\middlewares;
/**
 *
 */
 abstract class BaseMiddleware
{
     /**
      * @return mixed
      */
     abstract public function execute();
}