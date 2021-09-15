<?php

namespace app\core\form;

use app\core\Model;

class InputField extends BaseField
{
    const TYPE_EMAIL = 'email';
    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password'; //add more types lists, checkboxes etc


    public string $type;
    public $disabled;

    public function __construct(Model $model, string $attribute,$disabled = null){
        $this->type = self::TYPE_TEXT;
        $this->disabled = $disabled;
        parent::__construct($model, $attribute);
    }


    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function emailField()
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function renderInput(): string
    {
       return sprintf('<input type="%s" name="%s" value="%s" style="%s" %s >',
           $this->type,
           $this->attribute,
           $this->model->hasError($this->attribute) ? "border: 1px solid red;" : '',
       $this->model->{$this->attribute},
       !is_null($this->disabled) ? "disabled" : ''
       );
    }
}