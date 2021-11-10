<?php

namespace J3dyy\CrudHelper\Elements;

use Illuminate\View\View;

class Button extends Element
{

    public $wrapLink = false;

    public function __construct($key, $content, $classes = null, $id = null, array $dataAttrs = [], bool $wrapLink = false)
    {
        parent::__construct(ElementTypes::BUTTON, $key, $content, $classes, $id, $dataAttrs);
        $this->wrapLink = $wrapLink;
    }

    public function asLink()
    {
        $this->wrapLink = true;
        return $this;
    }

    function transform(array $entity): View
    {
        return view('administration');
    }
}
