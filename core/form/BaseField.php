<?php

namespace app\core\form;

use app\core\Model;

/**
 *
 */
abstract   class BaseField
{


    /**
     * @var Model
     */
    public Model $model;
    /**
     * @var string
     */
    public string $attribute;

    /**
     * @return string
     */
    abstract public function renderInput(): string;


    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {

        $this->model = $model;
        $this->attribute = $attribute;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('
         <div class="mb-3 form-group">
               <label>%s</label>
            %s
               <div class="invalid-feedback">
               %s
                </div>
            </div>   
        ', $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}