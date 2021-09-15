<?php

namespace app\core\form;

use app\core\Model;

class ImageField
{
    public Model $model;
    public string $attribute;


    public function __construct(Model $model, string $attribute){
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString(): string
    {
        return sprintf('<img src="%s">',
        $this->attribute ?? '/img/placeholder-150.png');
    }
}