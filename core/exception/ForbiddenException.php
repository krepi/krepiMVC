<?php

namespace app\core\exception;

/**
 *
 */
class ForbiddenException extends \Exception
{
    /**
     * @var int
     */
    protected $code = 403;
    /**
     * @var string
     */
    protected $message = 'You don\'t have permissions to access this page';
}