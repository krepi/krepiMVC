<?php

namespace app\core\form;

use app\core\Model;

/**
 *
 */
class Form
{
    /**
     * @param $action
     * @param $method
     * @return Form
     */
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    /**
     * @return void
     */
    public static function end()
    {
        echo '</form>';
    }

    /**
     * @param Model $model
     * @param $attribute
     * @return InputField
     */
    public function field(Model $model, $attribute)
    {
        return new InputField($model, $attribute);
    }
}