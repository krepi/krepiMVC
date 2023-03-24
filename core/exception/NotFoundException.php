<?php

namespace app\core\exception;

/**
 *
 */
class NotFoundException extends \Exception
{
    /**
     * @var int
     */
    protected $code = 404;
    /**
     * @var string
     */
    protected $message = 'Page not found';
}