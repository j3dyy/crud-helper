<?php

namespace J3dyy\CrudHelper\Elements;

use Illuminate\View\View;

class Button extends Element
{


    public $link = null;

    public function __construct($key, $content, $classes = null, $id = null, array $dataAttrs = [], string $link = null)
    {
        parent::__construct(ElementTypes::BUTTON, $key, $content, $classes, $id, $dataAttrs);
        $this->link = $link;
    }

    public function asLink($url)
    {
        $this->link = $url;
        return $this;
    }


    function transform(array $entity): View
    {
        return view('administration');
    }
}
