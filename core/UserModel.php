<?php

namespace app\core;

use app\core\db\DbModel;

/**
 *
 */
abstract class UserModel extends DbModel
{

    /**
     * @return string
     */
    abstract public function getDisplayName(): string;

}